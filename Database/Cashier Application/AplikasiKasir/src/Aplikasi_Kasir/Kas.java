/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Aplikasi_Kasir;

import javax.swing.JOptionPane;

/**
 *
 * @author Alex
 */
public class Kas extends MetodePembayaran {
    
    private float dibayar;
    private float kembalian;

    public Kas(float total_harga) {
        super(total_harga);
    }

    public Kas(float total_harga, float dibayar) {
        super(total_harga);
        this.dibayar = dibayar;
        this.kembalian = this.dibayar - this.total_harga;
    }
    

    public float getDibayar() {
        return dibayar;
    }

    public float getKembalian() {
        return kembalian;
    }

    public void setDibayar(float dibayar) {
        this.dibayar = dibayar;
    }

    public void setKembalian(float kembalian) {
        this.kembalian = kembalian;
    }
    
    @Override
    public void Payment() {
        KasPayment pay = new KasPayment(this);
        pay.setVisible(true);
    }
    
    public void calculateChange(){
        this.kembalian = (this.dibayar - this.total_harga);
    }
    
}
