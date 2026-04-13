# Run The Project

## Files already used by the app

- Main class: `src/main/java/tn/esprit/mains/MainApp.java`
- FXML view: `src/main/resources/fxml/GoalView.fxml`
- Controller: `src/main/java/tn/esprit/controllers/GoalController.java`
- Database config: `src/main/resources/db.properties`
- Database schema: `src/main/resources/sql/nex_schema.sql`

## Manual steps in IntelliJ

1. Open the project in IntelliJ.
2. Wait for Maven import to finish. If IntelliJ shows a Maven banner, click `Load Maven Changes`.
3. Check Project SDK:
   - `File` -> `Project Structure` -> `Project`
   - Set `Project SDK` to Java 17.
4. Check the run configuration:
   - Top right dropdown -> `Edit Configurations`
   - Create a new `Application` configuration if needed
   - Name: `MainApp`
   - Main class: `tn.esprit.mains.MainApp`
   - Use classpath of module: your project module
5. If IntelliJ does not run JavaFX automatically, add VM options:
   - `--module-path "C:\path\to\javafx-sdk-21\lib" --add-modules javafx.controls,javafx.fxml`
   - If Maven dependencies are resolved correctly, you usually do not need this when running through Maven.

## Database setup

1. Start MySQL.
2. Create the database and table by running:
   - `src/main/resources/sql/nex_schema.sql`
3. Check `src/main/resources/db.properties`.
4. Update these values if your MySQL setup is different:
   - `db.url`
   - `db.user`
   - `db.password`

Default config currently expects:

```properties
db.url=jdbc:mysql://localhost:3306/nex?useSSL=false&serverTimezone=UTC
db.user=root
db.password=
db.driver=com.mysql.cj.jdbc.Driver
```

## Run with Maven

From the project root:

```powershell
mvn javafx:run
```

## If the app opens but shows a database error

- MySQL is not running, or
- the `nex` database/table is missing, or
- the username/password in `db.properties` is wrong.
