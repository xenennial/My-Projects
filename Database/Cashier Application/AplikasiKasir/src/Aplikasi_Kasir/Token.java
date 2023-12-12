/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Aplikasi_Kasir;

/**
 *
 * @author Alex
 */
public class Token extends Barang{
    private String noMeteran;
    private float nominal;
    private String token;

    public Token(String noMeteran, float nominal) {
        this.noMeteran = noMeteran;
        this.nominal = nominal;
    }
    
    public String getNoMeteran() {
        return noMeteran;
    }

    public float getNominal() {
        return nominal;
    }

    public String getToken() {
        return token;
    }

    public void setNoMeteran(String noMeteran) {
        this.noMeteran = noMeteran;
    }

    public void setNominal(float nominal) {
        this.nominal = nominal;
    }

    public void setToken(String token) {
        this.token = token;
    }
    
    public void generateToken(){
        this.token = RandomGenerator.generateRandomIntegersAsString(20, 0, 9);
    }
    
}
