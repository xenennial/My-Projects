package Aplikasi_Kasir;

import java.sql.SQLException;
import java.sql.Statement;
import java.sql.ResultSet;

import java.util.ArrayList;
import java.util.Date;

public class Barang {
    protected String kode;
    protected String nama;
    protected float harga;
    
    public static ArrayList<Barang> daftarBarang = new ArrayList<>();
    
    public String getNama(){
        return this.nama;
    }
    
    public String getKode(){
        return this.kode;
    }
    
    public float getHarga(){
        return this.harga;
    }

    public void setKode(String kode) {
        this.kode = kode;
    }

    public void setNama(String nama) {
        this.nama = nama;
    }

    public void setHarga(float harga) {
        this.harga = harga;
    }
    
    
    
    public static void loadMarket(){
        try {
            Statement stmt = DBConnector.conn.createStatement();
            String sql =    """
                            SELECT b.*, m.kadaluarsa
                            FROM barang AS b
                            LEFT JOIN makanan AS m ON b.kode = m.kode
                            LEFT JOIN pulsa AS p ON b.kode = p.kode
                            LEFT JOIN token AS t ON b.kode = t.kode
                            WHERE p.kode IS NULL AND t.kode IS NULL;
                            """;
            ResultSet rs = stmt.executeQuery(sql);
            
            while (rs.next()){
                Date tgl_kadaluarsa = rs.getDate("kadaluarsa");
                if (tgl_kadaluarsa == null){
                    Barang barang = new Barang();
                    barang.kode = rs.getString("kode");
                    barang.nama = rs.getString("nama");
                    barang.harga = rs.getFloat("harga");
                    daftarBarang.add(barang);
                }
                else {
                    Makanan makanan = new Makanan(tgl_kadaluarsa);
                    makanan.kode = rs.getString("kode");
                    makanan.nama = rs.getString("nama");
                    makanan.harga = rs.getFloat("harga");
                    daftarBarang.add(makanan);
                }
            }
        }
        catch (SQLException ex) {
            System.out.println(ex);
        }
    }
}
