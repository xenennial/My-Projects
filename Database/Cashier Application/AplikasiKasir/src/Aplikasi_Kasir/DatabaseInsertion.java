package Aplikasi_Kasir;

import java.sql.Statement;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import java.sql.ResultSet;
import java.util.ArrayList;
import javax.swing.JOptionPane;


public class DatabaseInsertion {

    public static void insertNewPayment(MetodePembayaran payment) {
        //insert the superclass attributes
        String sql = "INSERT INTO `pembayaran` (`id_pembayaran`, `total_harga`, `waktu`, `status`) VALUES (NULL, ?, ?, ?)";
        try {
            PreparedStatement stmt = DBConnector.conn.prepareStatement(sql);
            stmt.setFloat(1, payment.getTotalHarga());
            stmt.setString(2, payment.getWaktuPembayaran().toString());
            stmt.setString(3, payment.getStatus().toString());

            int rows = stmt.executeUpdate();
            System.out.println("insert successful, affected " + rows + " rows");
        } catch (SQLException e) {
            e.printStackTrace();
        }

        //get last inserted ID
        int currentId = 0;
        try {
            sql = "SELECT MAX(id_pembayaran) AS current_id FROM `pembayaran`;";

            Statement statement = DBConnector.conn.createStatement();
            ResultSet resultSet = statement.executeQuery(sql);

            if (resultSet.next()) {
                currentId = resultSet.getInt("current_id");
            }

        } catch (SQLException e) {
            e.printStackTrace();
        }

        //insert corresponding subclass attributes
        if (payment instanceof Kas){
            Kas tempkas = (Kas)payment;
            
            sql = "INSERT INTO `kas` (`id_pembayaran`, `dibayar`, `kembalian`) VALUES (?, ?, ?)";
            try {
                PreparedStatement stmt = DBConnector.conn.prepareStatement(sql);
                stmt.setInt(1, currentId);
                stmt.setFloat(2, tempkas.getDibayar());
                stmt.setFloat(3, tempkas.getKembalian());
                
                stmt.executeUpdate();
            }
            catch (SQLException e){
                e.printStackTrace();
            }
        }
        else if (payment instanceof KartuDebit){
            KartuDebit tempdebit = (KartuDebit)payment;
            
            sql = "INSERT INTO `debit` (`id_pembayaran`, `bank`, `no_kartu`) VALUES (?, ?, ?)";
            try {
                PreparedStatement stmt = DBConnector.conn.prepareStatement(sql);
                stmt.setInt(1, currentId);
                stmt.setString(2, tempdebit.getBank());
                stmt.setString(3, tempdebit.getCardNumber());
                
                stmt.executeUpdate();
            }
            catch (SQLException e){
                e.printStackTrace();
            }
        }
        else {
            QRIS tempqris = (QRIS)payment;
            
            sql = "INSERT INTO `qris` (`id_pembayaran`, `content`, `request_date`, `invoiceID`) VALUES (?, ?, ?, ?)";
            try {
                PreparedStatement stmt = DBConnector.conn.prepareStatement(sql);
                stmt.setInt(1, currentId);
                stmt.setString(2, tempqris.getcontent());
                stmt.setString(3, tempqris.getReqDate().toString());
                stmt.setString(4, tempqris.getInvoice());
                
                stmt.executeUpdate();
            }
            catch (SQLException e){
                e.printStackTrace();
            }
        }
        
        ArrayList<MetodePembayaran.Item> tempcart = payment.getCart();
        sql = "INSERT INTO `transaksi_items` (`kode`, `jumlah`, `id_pembayaran`) VALUES (?, ?, ?)";
        try {
            PreparedStatement stmt = DBConnector.conn.prepareStatement(sql);
            
            for (int i = 0; i < tempcart.size(); i++){
                stmt.setString(1, tempcart.get(i).getBarang().getKode());
                stmt.setInt(2, tempcart.get(i).getAmount());
                stmt.setInt(3, currentId);
                stmt.executeUpdate();
            }
        }
        catch (SQLException e){
            e.printStackTrace();
        }
        
        payment.setIDPembayaran(currentId);
        if (payment.getFlag() == MetodePembayaran.Flags.PULSA) insertNewPulsaHistory(payment);
        if (payment.getFlag() == MetodePembayaran.Flags.TOKEN) insertNewTokenHistory(payment);
    }
    
    public static void insertNewPulsaHistory(MetodePembayaran metode){
        Pulsa pulsa = (Pulsa) metode.getBarangAt(0);
        String sql = "INSERT INTO `pulsa_history` (`kode`, `no_telp`, `operator`, `id_pembayaran`) VALUES (?, ?, ?, ?)";
        try {
            PreparedStatement stmt = DBConnector.conn.prepareStatement(sql);
            stmt.setString(1, pulsa.getKode());
            stmt.setString(2, pulsa.getNoTelp());
            stmt.setString(3, pulsa.getOperator());
            stmt.setInt(4, metode.getIDPembayaran());
            
            stmt.executeUpdate();
        }
        catch(SQLException e){
            e.printStackTrace();
        }
    }
    
    public static void insertNewTokenHistory(MetodePembayaran metode){
        Token token = (Token) metode.getBarangAt(0);
        token.generateToken();
        
        String sql = "INSERT INTO `token_history` (`kode`, `no_meteran`, `nominal`, `token`, `id_pembayaran`) VALUES (?, ?, ?, ?, ?)";
        try {
            PreparedStatement stmt = DBConnector.conn.prepareStatement(sql);
            stmt.setString(1, token.getKode());
            stmt.setString(2, token.getNoMeteran());
            stmt.setFloat(3, token.getNominal());
            stmt.setString(4, token.getToken());
            stmt.setInt(5, metode.getIDPembayaran());
            
            stmt.executeUpdate();
        }
        catch(SQLException e){
            e.printStackTrace();
        }
        
        String tokenstr = token.getToken();
        JOptionPane.showMessageDialog(null, "Token PLN anda:\n" + tokenstr.substring(0, 5) + ' ' + tokenstr.substring(5, 10) + ' ' + tokenstr.substring(10, 15) + ' ' + tokenstr.substring(15, 19), "Payment Successful", JOptionPane.INFORMATION_MESSAGE);
    }
}
