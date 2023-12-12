package Aplikasi_Kasir;

import java.util.ArrayList;

/**
 *
 * @author Elin
 */
public class Transaksi {

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

    //atribut transaksi: daftar barang dibeli, total belanja, jumlah dibayar, kembalian, waktu
    private ArrayList<Item> item_transaksi = new ArrayList<>();
    private float total_harga;

    //constructor, barang ditambah setelah objek dibuat
    public Transaksi(float harga_belanjaan) {
        this.total_harga = harga_belanjaan;
    }

    //methods
    //untuk debugging
    public void displayTransaksi() {
        for (Item barang : item_transaksi) {
            System.out.println("Barang: " + barang.getBarang().getNama() + " berjumlah " + barang.getAmount());
        }
    }

    //get
    public int getItemCount() {
        return item_transaksi.size();
    }

    public Item getItem(int index) {
        return item_transaksi.get(index);
    }

    public Barang getBarangAt(int index) {
        return item_transaksi.get(index).getBarang();
    }

    public int getAmountAt(int index) {
        return item_transaksi.get(index).getAmount();
    }

    public float getTotalBelanja() {
        return total_harga;
    }

    //set
    public void addItem(Barang to_add, int count) {
        this.item_transaksi.add(new Item(to_add, count));
    }

    public void changeItem(Barang to_change, int count, int index) {
        this.item_transaksi.set(index, new Item(to_change, count));
    }

    public void changeItem(Item to_change, int index) {
        this.item_transaksi.set(index, to_change);
    }

    public void changeMeta(float total_belanja) {
        this.total_harga = total_belanja;
    }
}
