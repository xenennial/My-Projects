/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Aplikasi_Kasir;

import java.util.Date;

/**
 *
 * @author Alex
 */
public class Makanan extends Barang{
    private Date kadaluarsa;
    
    public Makanan(Date kadaluarsa){
        this.kadaluarsa = kadaluarsa;
    }
    
    public Date getKadaluarsa(){
        return this.kadaluarsa;
    }
    
    public void setKadaluarsa(Date tgl){
        this.kadaluarsa = tgl;
    }
}
