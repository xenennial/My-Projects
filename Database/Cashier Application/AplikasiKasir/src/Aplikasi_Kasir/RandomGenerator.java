package Aplikasi_Kasir;

import java.util.Random;

public class RandomGenerator {

    public static int generateRandomInteger(int numberOfDigits) {
        Random random = new Random();
        int min = (int) Math.pow(10, numberOfDigits - 1);
        int max = (int) Math.pow(10, numberOfDigits) - 1;

        return random.nextInt(max - min + 1) + min;
    }

     public static String generateRandomIntegersAsString(int count, int min, int max) {
        if (count <= 0 || min > max) {
            throw new IllegalArgumentException("Invalid input parameters");
        }

        Random random = new Random();
        String res = "";

        for (int i = 0; i < count; i++) {
            int randomInt = random.nextInt((max - min) + 1) + min;
            res += Integer.toString(randomInt);
        }

        return res;
    }
}
