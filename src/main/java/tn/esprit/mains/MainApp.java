package tn.esprit.mains;

import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.scene.Scene;
import javafx.stage.Stage;
import tn.esprit.tools.MyDataBase;

public class MainApp extends Application {

    @Override
    public void start(Stage stage) throws Exception {
        MyDataBase.getInstance();

        FXMLLoader loader = new FXMLLoader(getClass().getResource("/fxml/GoalView.fxml"));
        Scene scene = new Scene(loader.load(), 1400, 850);
        scene.getStylesheets().add(getClass().getResource("/css/nexa.css").toExternalForm());

        stage.setTitle("NEXA Goals Dashboard");
        stage.setScene(scene);
        stage.show();
    }

    public static void main(String[] args) {
        launch(args);
    }
}
