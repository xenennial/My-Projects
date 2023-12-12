package Aplikasi_Kasir;

import java.util.ArrayList;

public class PaymentCache {
    private static ArrayList<MetodePembayaran> history;

    public static ArrayList<MetodePembayaran> getPaymentHistory() {
        return history;
    }

    public static void setPaymentHistory(ArrayList<MetodePembayaran> payment_history) {
        PaymentCache.history = payment_history;
    }
    
    public static void addPayment(MetodePembayaran payment){
       PaymentCache.history.add(payment);
    }
    
    public static int getPaymentLength(){
        return PaymentCache.history.size();
    }
    
    public static MetodePembayaran getPaymentAt(int index){
        return PaymentCache.history.get(index);
    }
    
    public static void removePayment(int index){
        PaymentCache.history.remove(index);
    }
}
