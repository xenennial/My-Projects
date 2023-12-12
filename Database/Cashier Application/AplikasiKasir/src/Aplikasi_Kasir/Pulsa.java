/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Aplikasi_Kasir;

/**
 *
 * @author Alex
 */
public class Pulsa extends Barang{
    private String operator;
    private String noTelp;
    private float nominal;

    public Pulsa(String operator, String noTelp, float nominal) {
        this.operator = operator;
        this.noTelp = noTelp;
        this.nominal = nominal;
    }
           
    public String getOperator() {
        return operator;
    }

    public String getNoTelp() {
        return noTelp;
    }

    public float getNominal() {
        return nominal;
    }

    public void setOperator(String operator) {
        this.operator = operator;
    }

    public void setNoTelp(String noTelp) {
        this.noTelp = noTelp;
    }

    public void setNominal(float nominal) {
        this.nominal = nominal;
    }

}
