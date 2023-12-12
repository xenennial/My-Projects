package Aplikasi_Kasir;

import java.time.LocalDateTime;
import java.time.format.DateTimeFormatter;
import java.util.ArrayList;
import javax.swing.JOptionPane;

import java.util.Random;

interface Pembayaran {

    float getTotalHarga();

    void setTotalHarga(float totalHarga);

    LocalDateTime getWaktuPembayaran();

    void setWaktuPembayaran(LocalDateTime waktuPembayaran);

    int getIDPembayaran();

    void setIDPembayaran(int IDPembayaran);
}

//class yang menyimpan satu transaksi dan data yang berkaitan
public abstract class MetodePembayaran implements Pembayaran {
    protected float total_harga; //total harga belanjaan
    protected LocalDateTime waktu_pembayaran; //waktu dibayar
    protected int id_pembayaran; //id dari pembelian
    protected PaymentState status; //status pembelian
    protected Flags flag = Flags.NONE;
    
    public enum PaymentState {
        PENDING,
        SUCCESSFUL,
        CANCELLED
    }
    
    public enum Flags {
        NONE,
        PULSA,
        TOKEN
    }
    
   
    public abstract void Payment(); //lakukan pembayaran
    
    public MetodePembayaran(float total_harga) {
        this.status = PaymentState.PENDING;
        this.total_harga = total_harga;
        this.waktu_pembayaran = LocalDateTime.now();
    }

    public void setFlag(Flags flag) {
        this.flag = flag;
    }

    public Flags getFlag() {
        return flag;
    }
    
    
        
    //interface methods
    @Override
    public float getTotalHarga() {
        return this.total_harga;
    }

    @Override
    public void setTotalHarga(float totalHarga) {
        this.total_harga = totalHarga;
    }

    @Override
    public LocalDateTime getWaktuPembayaran() {
        return waktu_pembayaran;
    }
    
    public String getWaktuPembayaranStr() {
        DateTimeFormatter formatter = DateTimeFormatter.ofPattern("yyyy-MM-dd hh:mm:ss");
        return waktu_pembayaran.format(formatter);
    }

    @Override
    public void setWaktuPembayaran(LocalDateTime waktuPembayaran) {
        this.waktu_pembayaran = waktuPembayaran;
    }

    @Override
    public int getIDPembayaran() {
        return this.id_pembayaran;
    }

    @Override
    public void setIDPembayaran(int IDPembayaran) {
        this.id_pembayaran = IDPembayaran;
    }
        
    public PaymentState getStatus(){
        return this.status;
    }
    
    public void setStatus(PaymentState status){
        this.status = status;
    }
    
    //methods for cart
    public class Item {

        private Barang barang = new Barang();
        private int amount = 0;

        public Item(Barang to_insert, int count) {
            this.barang = to_insert;
            this.amount = count;
        }

        //get
        public Barang getBarang() {
            return this.barang;
        }

        public int getAmount() {
            return this.amount;
        }

        //set
        public void setItem(Barang to_insert, int count) {
            this.barang = to_insert;
            this.amount = count;
        }
    }
    private ArrayList<Item> cart = new ArrayList<>(); //barang yang dibeli
    
    public void displayCart() {
        for (Item barang : cart) {
            System.out.println("Barang: " + barang.getBarang().getNama() + " berjumlah " + barang.getAmount());
        }
    }
    //get
    public int getItemCount() {
        return cart.size();
    }

    public Item getItem(int index) {
        return cart.get(index);
    }

    public Barang getBarangAt(int index) {
        return cart.get(index).getBarang();
    }

    public int getAmountAt(int index) {
        return cart.get(index).getAmount();
    }
    
    public ArrayList<Item> getCart(){
        return this.cart;
    }

    //set
    public void addItem(Barang to_add, int count) {
        this.cart.add(new Item(to_add, count));
    }

    public void changeItem(Barang to_change, int count, int index) {
        this.cart.set(index, new Item(to_change, count));
    }

    public void changeItem(Item to_change, int index) {
        this.cart.set(index, to_change);
    }

    public void changeMeta(float total_belanja) {
        this.total_harga = total_belanja;
    }
}
