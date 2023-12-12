package Aplikasi_Kasir;

import java.time.LocalDateTime;
import java.time.format.DateTimeFormatter;
import java.util.Random;

public class QRIS extends MetodePembayaran {
    
    private String Content;
    private LocalDateTime requestDate;
    private String invoiceID;

    public QRIS(float total_harga) {
        super(total_harga);
    }

    public String getcontent() {
        return this.Content;
    }

    public LocalDateTime getReqDate() {
        return this.requestDate;
    }
    
    public String getReqDateStr(){
        return this.requestDate.format(DateTimeFormatter.ISO_DATE);
    }
    
    public String getInvoice(){
        return this.invoiceID;
    }

    //mockup, doesnt actually connect with API
    private String createQRISContent() {
        StringBuilder sb = new StringBuilder();
        Random random = new Random();
        String chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz.";
        for (int i = 0; i < 242; i++) {
            int index = random.nextInt(chars.length());
            char randomChar = chars.charAt(index);
            sb.append(randomChar);
        }
        return sb.toString();
    }

    @Override
    public void Payment() {
        this.invoiceID = Integer.toString(RandomGenerator.generateRandomInteger(9));
        this.Content = createQRISContent();
        this.requestDate = LocalDateTime.now();
        QRISPayment frame = new QRISPayment(this);
        frame.setVisible(true);
    }
}
