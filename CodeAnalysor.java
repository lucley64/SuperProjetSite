import java.io.File;
import java.util.Scanner;
public class CodeAnalysor
{
    public static void main(String[] args) throws Exception
    {
        File doc =
          new File("C:\\Drive\\Learn.txt");
        Scanner obj = new Scanner(doc);

        while (obj.hasNextLine())
            System.out.println(obj.nextLine());
        }
}