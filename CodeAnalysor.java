import java.io.File;
import java.util.Scanner;
public class CodeAnalysor {
    public CodeAnalysor(File inputFile_) throws FileNotFoundException {
        File pythonFile =
          inputFile_;
        Scanner scanner = new Scanner(pythonFile);

        while (scanner.hasNextLine()) {
            System.out.println(scanner.nextLine());
        }
    }
}