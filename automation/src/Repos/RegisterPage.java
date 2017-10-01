package Repos;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.Select;

public class RegisterPage extends BasePage {

	public RegisterPage() {
		super("");

	}
	public static WebElement Email(WebDriver driver) {
		return driver.findElement(By.id("email"));
	}
	public static WebElement Password(WebDriver driver) {
		return driver.findElement(By.id("password"));
	}
	public static WebElement PasswordConfirm(WebDriver driver) {
		return driver.findElement(By.id("password-confirm"));
	}
	public static WebElement FirstName(WebDriver driver) {
		return driver.findElement(By.id("firstname"));
	}	
	public static WebElement LastName(WebDriver driver) {
		return driver.findElement(By.id("lastname"));
	}
	public static WebElement ContactNo(WebDriver driver) {
		return driver.findElement(By.id("contactno"));
	}
	public static WebElement StudentRole(WebDriver driver) {
		return driver.findElement(By.id("roleStudent"));
	}
	public static WebElement InstructorRole(WebDriver driver) {
		return driver.findElement(By.id("roleInstructor"));
	}
	public static WebElement department(WebDriver driver) {
		return driver.findElement(By.id("departmentName"));
	}	
	public static WebElement SecurityQ1(WebDriver driver) {
		return driver.findElement(By.name("security_question1_Id"));
	}
	public static WebElement SecurityQ2(WebDriver driver) {
		return driver.findElement(By.name("security_question2_Id"));
	}
	public static WebElement SecurityQ3(WebDriver driver) {
		return driver.findElement(By.name("security_question3_Id"));
	}
	public static WebElement SecurityA1(WebDriver driver) {
		return driver.findElement(By.id("security_answer1"));
	}
	public static WebElement SecurityA2(WebDriver driver) {
		return driver.findElement(By.id("security_answer2"));
	}
	public static WebElement SecurityA3(WebDriver driver) {
		return driver.findElement(By.id("security_answer3"));
	}
	public static WebElement Submit(WebDriver driver) {
		return driver.findElement(By.xpath("//button[@type='submit']"));
	}
	public void RegisterAsStudent(WebDriver driver)
	{
		RegisterPage.Email(driver).sendKeys("");
		RegisterPage.Password(driver).sendKeys("");
		RegisterPage.PasswordConfirm(driver).sendKeys("");
		RegisterPage.FirstName(driver).sendKeys("");
		RegisterPage.LastName(driver).sendKeys("");
		RegisterPage.ContactNo(driver).sendKeys("");
		RegisterPage.StudentRole(driver).click();	
		Select se = new Select(RegisterPage.SecurityQ1(driver));
		se.selectByValue("");
		RegisterPage.SecurityA1(driver).sendKeys("");
		Select se1 = new Select(RegisterPage.SecurityQ2(driver));
		se1.selectByValue("");
		RegisterPage.SecurityA2(driver).sendKeys("");
		Select se2 = new Select(RegisterPage.SecurityQ3(driver));
		se2.selectByValue("");
		RegisterPage.SecurityA3(driver).sendKeys("");
		RegisterPage.Submit(driver).click();

	}
	public void RegisterAsInstructor(WebDriver driver)
	{
		RegisterPage.Email(driver).sendKeys("");
		RegisterPage.Password(driver).sendKeys("");
		RegisterPage.PasswordConfirm(driver).sendKeys("");
		RegisterPage.FirstName(driver).sendKeys("");
		RegisterPage.LastName(driver).sendKeys("");
		RegisterPage.ContactNo(driver).sendKeys("");
		RegisterPage.InstructorRole(driver).click();
		RegisterPage.department(driver).sendKeys("");
		Select se = new Select(RegisterPage.SecurityQ1(driver));
		se.selectByValue("");
		RegisterPage.SecurityA1(driver).sendKeys("");
		Select se1 = new Select(RegisterPage.SecurityQ2(driver));
		se1.selectByValue("");
		RegisterPage.SecurityA2(driver).sendKeys("");
		Select se2 = new Select(RegisterPage.SecurityQ3(driver));
		se2.selectByValue("");
		RegisterPage.SecurityA3(driver).sendKeys("");
		RegisterPage.Submit(driver).click();

	}







}
