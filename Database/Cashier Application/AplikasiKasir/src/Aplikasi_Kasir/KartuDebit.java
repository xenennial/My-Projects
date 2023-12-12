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
public class KartuDebit extends MetodePembayaran {
    
    private String Bank;
    private String CardNumber;

    public KartuDebit(float total_harga) {
        super(total_harga);
    }

    public String getBank() {
        return Bank;
    }

    public void setBank(String Bank) {
        this.Bank = Bank;
    }

    public String getCardNumber() {
        return CardNumber;
    }

    public void setCardNumber(String CardNumber) {
        this.CardNumber = CardNumber;
    }

    @Override
    public void Payment() {
        DebitPayment pay = new DebitPayment(this);
        pay.setVisible(true);
    }
    
}
