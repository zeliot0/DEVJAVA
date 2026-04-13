package tn.esprit.tools;

import java.io.IOException;
import java.io.InputStream;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.util.Properties;

public class MyDataBase {

    private static final String DEFAULT_URL = "jdbc:mysql://localhost:3306/nex?useSSL=false&serverTimezone=UTC";
    private static final String DEFAULT_USER = "root";
    private static final String DEFAULT_PASSWORD = "";

    private static MyDataBase instance;
    private Connection cnx;

    private MyDataBase() {
        try {
            Properties properties = loadProperties();
            String url = properties.getProperty("db.url", DEFAULT_URL);
            String user = properties.getProperty("db.user", DEFAULT_USER);
            String password = properties.getProperty("db.password", DEFAULT_PASSWORD);
            String driver = properties.getProperty("db.driver");

            if (driver != null && !driver.isBlank()) {
                Class.forName(driver);
            }

            cnx = DriverManager.getConnection(url, user, password);
            System.out.println("Connected to database successfully");
        } catch (SQLException | ClassNotFoundException e) {
            throw new RuntimeException("Database connection failed: " + e.getMessage(), e);
        }
    }

    public static MyDataBase getInstance() {
        if (instance == null) {
            instance = new MyDataBase();
        }
        return instance;
    }

    public Connection getCnx() {
        return cnx;
    }

    private Properties loadProperties() {
        Properties properties = new Properties();

        try (InputStream inputStream = getClass().getResourceAsStream("/db.properties")) {
            if (inputStream != null) {
                properties.load(inputStream);
            }
        } catch (IOException e) {
            throw new RuntimeException("Unable to read db.properties: " + e.getMessage(), e);
        }

        return properties;
    }
}
