package com.example.demo.Registeration;

import java.io.IOException;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.nio.file.StandardOpenOption;
import java.time.LocalDate;
import java.time.LocalTime;
import java.time.format.DateTimeFormatter;
import java.util.*;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.core.env.Environment;
import org.springframework.core.io.ByteArrayResource;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.mail.javamail.JavaMailSender;
import org.springframework.mail.SimpleMailMessage;
import org.springframework.stereotype.Service;

import com.example.demo.Config.Authentication;
import jakarta.mail.internet.MimeMessage;
import org.springframework.mail.javamail.MimeMessageHelper;

import org.springframework.security.core.userdetails.UsernameNotFoundException;
import org.springframework.security.crypto.bcrypt.BCryptPasswordEncoder;
import org.springframework.security.crypto.password.PasswordEncoder;

@Service
public class EmpRegistrationService {

	@Autowired

	JdbcTemplate jdbctemp;

	@Autowired

	JdbcTemplate jdbct;
	@Autowired

	JavaMailSender j;
	
	 @Autowired
	    private Environment env;

	   


	public boolean userEmail(String empemail,String pname) {
		try {
//			SimpleMailMessage sm = new SimpleMailMessage();
//			sm.setFrom("kanapareddyjeevitha2003@gmail.com");
//			sm.setTo(empemail);
//
//			System.out.print(empemail + "from mail");
//			sm.setText("“Thanks for registering! We've reserved your space — see you there.” ");
//			sm.setSubject("acknowledgement for joing in Miracle apps Team !!!");
//
//			j.send(sm);
			
			MimeMessage message = jms.createMimeMessage();
			MimeMessageHelper helper = new MimeMessageHelper(message, true);
			helper.setFrom("kanapareddyjeevitha2003@gmail.com");
			helper.setTo(empemail);
			helper.setSubject("acknowledgement for joing in Miracle apps Team !!!");
			String mailContent = "<!DOCTYPE html>"
					+ "<html lang='en'>"
					+ "<head>"
					+ "<meta charset='UTF-8'>"
					+ "<meta name='viewport' content='width=device-width, initial-scale=1.0'>"
					+ "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css' integrity='sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh' crossorigin='anonymous'>"
					+ "<script src='https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'></script>"

			        +"<script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>"
			        +"<script src='https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js' integrity='sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin='anonymous'></script>"
			        +"<title>email</title>"
			        +"</head>"
			        + "<style>"
			        + "</style>"
			        + "<body>"
			        + "<div class='card' style='width:30rem; height:15rem; background-color:black' >"
			        + "<img alt='Image' style='margin-left:1rem'width='129' height='49' src='https://images.miraclesoft.com/careers/footer/miracle-logo-white.png'>"
			        +"<h2 style=' text-align:center;color:rgba(159, 54, 162, 0.923);font-style: oblique;font-size:large; font-family: sans-serif;'>Hello"+pname+"! Welcome to Miracle apps Team</h2>"
			        +"<p style='margin-left:2rem; font-size:medium; font-style: oblique;color:chocolate  ; font-family: sans-serif;'>“Thanks for registering! We've reserved your space — see you there.” </p>"
			       
			        +"</div> "
			        +"</body>"
			        +"</html>";
			
		
			helper.setText(mailContent, true);
			
			jms.send(message);
			return true;
		} catch (Exception e) {
		}
		return false;
	}

//return response;
	public boolean adminEmail(String empemail) {
		try {

			String fname = "", lname = "", dob = "", gender = "", skills = "", email = "", phone = "";
			int empId = 0;

			String sql1 = "select * from employee_data where email=?";
			List<Map<String, Object>> ResultData = jdbctemp.queryForList(sql1, empemail);
//empID, firstName, lastName, dateOfBirth, gender, skills, 
//password, email, createdBy, createdDate, modifyDate, phoneno, image
			for (Map<?, ?> fetch : ResultData) {
				System.out.println("empId-->" + fetch.get("empID"));

				if (fetch.get("empID") instanceof Integer)
					empId = (int) fetch.get("empID");
				else
			    empId = Math.toIntExact((long) fetch.get("empID"));

				fname = (String) fetch.get("firstName");
				lname = (String) fetch.get("lastName");
				dob = (String) fetch.get("dateOfBirth");
				gender = (String) fetch.get("gender");
				skills = (String) fetch.get("skills");
				email = (String) fetch.get("email");
				phone = (String) fetch.get("phoneno");
			}
			

			Map<String, Object> userData = ResultData.get(0);
			String imagePath = (String) userData.get("image");
			Path path = Paths.get(imagePath);
			byte[] imageBytes = Files.readAllBytes(path);
			String base64Image = Base64.getEncoder().encodeToString(imageBytes);
//			byte[] imgDecoderBytes = Base64.getDecoder().decode(base64Image);			// Decode base64 data			
MimeMessage message = jms.createMimeMessage();
MimeMessageHelper helper = new MimeMessageHelper(message, true);
helper.setTo("kanapareddyjeevitha2003@gmail.com");
helper.setSubject("New Employ joing in Miracle apps Team !!!Check Employ Details here");
String mailContent = "<!DOCTYPE html>"
		+ "<html lang='en'>"
		+ "<head>"
		+ "<meta charset='UTF-8'>"
		+ "<meta name='viewport' content='width=device-width, initial-scale=1.0'>"
		+ "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css' integrity='sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh' crossorigin='anonymous'>"
		+ "<script src='https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'></script>"

        +"<script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>"
        +"<script src='https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js' integrity='sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin='anonymous'></script>"
        +"<title>email</title>"
        +"</head>"
        + "<style>"
        + "</style>"
        + "<body>"
        + "<div class='card' style='width:30rem; height:25rem; background-color:black' >"
        + "<img alt='Image' style='margin-left:1rem'width='129' height='49' src='https://images.miraclesoft.com/careers/footer/miracle-logo-white.png'>"
        +"<h2 style=' text-align:center;color:blue; font-weight: bold ;font-size:large; font-family: sans-serif;'>Miracle apps Team</h2>"
        +"<p style='margin-left:2rem; font-size:medium; font-style: oblique;color:chocolate  ; font-family: sans-serif;'>Hello! admin, a new employee joined in our Miracle apps Team. Check the details below:</p>"
        +"<div class='card' style='margin-left:4rem;font-weight: bold; font-style: oblique; width:20rem; height:15rem;color:rgb(202, 133, 15); background-color:black'>"
        + "<div class='row'>"
        + "<div class='col'>"
        +"Employee ID: " + empId
        +"</div>"
        + "<div class='col'>"
        + "<br>FirstName: " + fname
        +"</div>"
        + "<div class='col'>"
        + "<br>LastName: " + lname
        +" </div>"
        +"</div>"
        + "<div class='row'>"
        + "<div class='col'>"
        + "<br>Date Of Birth: " + dob
        +" </div>"
        + "<div class='col'>"
        + "<br>Gender: " + gender
        +" </div>"
        +" </div>"
        + "<div class='row'>"
        + "<div class='col'>"
        + "<br>Skills: " + skills
        +" </div>"
        
        + "<div class='col'>"
        + "<br>Email: " + email
        +" </div>"
        + "<div class='col'>"
        + "<br>Phone: " + phone 
        +" </div>"
          +" </div>"
        +"</div>"
        + "</div>"
        +"</div> "
        +"</body>"
        +"</html>";
String fileName=fname+empId;
helper.setText(mailContent, true);
helper.addInline(fileName, new ByteArrayResource(imageBytes), "image/png");
jms.send(message);
					return true;
		} catch (Exception e) {
			e.printStackTrace();
		}
		return false;
	}

	String lastName = "", firstName = "", phoneNo = "", empGender = "", emppassword = "", empemail = "", empskills = "",
			empdob = "", regex = "";

	public Map<String, Object> EmpInsertData(byte[] fileData, String fileName, String PhoneNum, String FirstName,
			String LastName, String Email, String Password, String DateofBirth, String Skills, String Gender) throws UsernameNotFoundException {

		
	
		System.out.print("method calling");

		Map<String, Object> response = new HashMap<>();
		response.put("success", false);
		response.put("message", "Invalid inputs");
		response.put("data", "");
		
     try {
			LocalDate currentDate1 = LocalDate.now();
			DateTimeFormatter formatter = DateTimeFormatter.ofPattern("MM-dd-yyyy");
			String currentDate = currentDate1.format(formatter);

			String fName = FirstName;
			regex = "^[A-Za-z]+$";
			if (fName == null || fName.isEmpty()) {
				response.put("message", "firstname can't be empty!!!");
				return response;
			} else if (!fName.matches(regex)) {// Pattern.compile(regex).matcher(fName).find()
				response.put("message", "In firstname numerics are not allowed! please enter only characters!!");
				return response;
			} else if (fName.length() > 60) {
				response.put("message", "firstname should be  below 60 charcters only!!! ");
				return response;
			} else {
				firstName = fName;
//      		 log1.info("fName validated!!!");
			}

			String lName = LastName;
			regex = "^[A-Za-z]+$";
			if (lName == null || lName.isEmpty()) {
				response.put("message", "lastname can't be empty!!!");
				return response;
			} else if (!lName.matches(regex)) {
				response.put("message", "In lastname numerics are not allowed! please enter only characters!!");
				return response;
			} else if (lName.length() > 60) {
				response.put("message", "lastname should be  below 60 charcters only!!! ");
				return response;
			} else {
				lastName = lName;
//  		 log1.info("lName validated!!!");
			}

			String gender = Gender;

			if (gender == null || gender.isEmpty()) {
				response.put("message", "gender can't be empty!!!");
				return response;
			} else {
				empGender = gender;
				// log1.info("gender validated!!!");
			}
			System.out.println("jeevitha  gmon");

////       
//            String passw = "jeevitha";
//            
//            System.out.println("jeevitha  gmon");
//            
//            String encryptedPassword = encryptPassword(passw);
//            
//            System.out.println("jeevitha  gmon");
//            
//            System.out.println("Encrypted Password: " + encryptedPassword);
//        
//----------------------------------------------------------->

			PasswordEncoder passwordEncoder = new BCryptPasswordEncoder();
//String encodedPassword = passwordEncoder.encode(pass);
// You can later use passwordEncoder.matches() to verify passwords
//----------------------------------------------------------->

			String pass = Password;
			System.out.print(pass);
			regex = "^[A-Z]+[A-Za-z0-9@!~%$#*]{8,16}$";

			if (pass == null || pass.isEmpty()) {
				response.put("message", "password can't be empty!!!");
				return response;
			} else if (!pass.matches(regex)) {
				response.put("message", "not strong password!!!");
				return response;
			} else {
				String encodedPassword = passwordEncoder.encode(pass);
				emppassword = encodedPassword;
				// log1.info("password validated!!!");
			}

			String phoneNum = PhoneNum;
			String sqlData1 = "select * from employee_data where phoneno=?";
			List<Map<String, Object>> empData1 = jdbctemp.queryForList(sqlData1, phoneNum);
			regex = "^[0-9]+$";

			if (phoneNum == null || phoneNum.isEmpty()) {
				response.put("message", "phone number can't be empty!!!");
				return response;
			} else if (!phoneNum.matches(regex)) {
				response.put("message", "phone number doesn't allow characters! please enter digits only !!!");
				return response;

			} else if (phoneNum.length() != 10) {
				response.put("message", "please enter valid phone number!!!");
				return response;
			}

			if (!empData1.isEmpty()) {
				response.put("message", "This phone number is  already registered with another account!!!");
				return response;
			} else {
				phoneNo = phoneNum;
//   		 log1.info("phone validated!!!");
			}

			String skills = Skills;
			String skillData[] = skills.split(",");
			if (skills == null || skills.isEmpty()) {
				response.put("message", "skills can't be empty!!!");
				return response;
			} else if (skillData.length < 2) {
				response.put("message", "Please select at least two skills !!!");
				return response;
			} else {
				empskills = skills;
				// log1.info("skills validated!!!");
			}

			String email = Email;
			String sqlData = "select * from employee_data where email=?";
			List<Map<String, Object>> empData = jdbctemp.queryForList(sqlData, email);

			regex = "^[a-zA-Z0-9]+@[a-zA-Z0-9]+.[a-zA-Z]+$";

			if (email == null || email.isEmpty()) {
				response.put("message", "email can't be empty!!!");
				// log1.error("email can't be empty!!!");
				return response;

			} else if (!email.matches(regex)) {
				response.put("message", "enter valid email !!!");
				// log1.error ("enter valid email !!!");
				return response;
			} else if (email.length() > 1000) {
				response.put("message", "email length should be below 1000");
				// log1.error("email length should be below 1000");
				return response;
			}

			if (!empData.isEmpty()) {
				response.put("message", "This email already registered with another account!!!");
				// log1.error ("This email already register with another account!!!");
				return response;
			} else {
				empemail = email;
				// log1.info("email validated!!!");
			}

			String dob = DateofBirth;

			// LocalDate dobdate = LocalDate.parse(dob);
			regex = "^\\d{4}-\\d{2}-\\d{2}$";

			if (dob == null || dob.isEmpty()) {
				response.put("message", "Date of birth should not be empty");
				// log1.error("Date of birth should not be empty");
				return response;
			} else if (!dob.matches(regex)) {
				response.put("message", "date of birth must should be in yyyy-mm-dd this formate");
				return response;
			} else if (!LocalDate.parse(dob, DateTimeFormatter.ofPattern("yyyy-MM-dd"))
					.isBefore(LocalDate.now().minusDays(1))) {

				response.put("message", "Date of birth should be in the past");
				// log1.error("Date of birth should be in the past");
				return response;
			} else {
				empdob = dob;
				// log1.info("dob validated!!!");
			}

			String username = FirstName.substring(0, 1) + LastName;
			// ---------------------------------->
			// System.out.println("hii");
//    byte[] image= emp.getImageData(); 
			// System.out.println("hello635656");
			// byte[] image = Base64.getDecoder().decode(emp.getImageData());
			// System.out.print(Arrays.toString(image)+"imageghghg");
//    if(image==null) {
//    	response.put("message", "image null");
//    	System.out.print("image null");
//    }
// String image_name=userName;
			

			// Extract the day of the month
			
			
			LocalDate dayDate = LocalDate.now();
			System.out.println(dayDate);
			int year=dayDate.getYear();
			int day = dayDate.getDayOfMonth();
			System.out.println(year);
			String[] month = {"jan", "feb", "mar", "april", "may", "jun", "july", "aug", "sep", "oct", "nov", "dec"};
			String months = month[LocalDate.now().getMonthValue() - 1];
			System.out.println(months);
			 String dateDay ="Day"+day;
			 System.out.print(dateDay);
			//String image_name=email + ""+ dayDate+ "" +year;
			LocalTime currentTime = LocalTime.now();
			int minutes = currentTime.getMinute();
			String image=username +"STD"+dayDate+""+minutes;
			String fileExtension = fileName.substring(fileName.lastIndexOf('.'));

			fileName = image + fileExtension;
            //file.path.url
			String folderPath= env.getProperty("file.path.url");
			System.out.print(folderPath);
			Path folder =Path.of(folderPath+year+"\\"+months+"\\"+dateDay);
			System.out.println("folder path"+ folder);
			Files.createDirectories(folder);
			String image_path=folder+"\\"+fileName;
		    Files.write(Path.of(image_path), fileData, StandardOpenOption.CREATE, StandardOpenOption.WRITE);

			System.out.println("hii1");
			String sql = "insert into employee_data (firstName, lastName, dateOfBirth, gender, skills, password, email, createdBy, createdDate, modifyDate, phoneno,image)values(?,?,?,?,?,?,?,?,?,?,?,?)";
			int k = jdbctemp.update(sql, firstName, lastName, empdob, empGender, empskills, emppassword, empemail,
					username, currentDate, currentDate, phoneNo, image_path);

			if (k > 0) {
				response.put("success", true);
//		 adminEmail(String empemail)
				System.out.println("method admin email calling !!!");
				boolean adminMail = adminEmail(empemail);
				System.out.println("method admin email calling !!!" + adminMail);
//		 EmpRegistrationService 
				String ProfileName=firstName+lastName;
				boolean mailresponse = userEmail(empemail,ProfileName);

				if (mailresponse == false || adminMail == false) {

					response.put("message", "failed to sent mail ");
				} else {
					response.put("message", "sucessfully inserted data and sent ,mail");
				}

				// log1.info("sucessfully inserted the data into db");
			}
		} catch (Exception e) {
			response.put("message", e);
			// log1.info("failed to inserted the data into db");
			System.out.println("hii33331");
		}
		return response;
	}
//-----------------------------select--------
	public Map<String, Object> EmpView() {

		Map<String, Object> response = new HashMap<String, Object>();
		response.put("success", false);
		response.put("message", "Invalid inputs");
		response.put("data", "");
		String sql = "select empID, firstName, lastName, skills from employee_data  order by empID desc;";
		List<Map<String, Object>> ResultData = jdbctemp.queryForList(sql);
		response.put("success", true);
		response.put("data", ResultData);

		return response;

	}

	public Map<String, Object> EmpIdView(int id) throws IOException {

		Map<String, Object> response = new HashMap<String, Object>();
		response.put("success", false);
		response.put("message", "Invalid inputs");
		response.put("data", "");

		String sql = "select * from employee_data where empID=?";
		List<Map<String, Object>> ResultData = jdbctemp.queryForList(sql, id);

		Map<String, Object> userData = ResultData.get(0);
		String imagePath = (String) userData.get("image");
		Path path = Paths.get(imagePath);
		byte[] imageBytes = Files.readAllBytes(path);
		String base64Image = Base64.getEncoder().encodeToString(imageBytes);

		System.out.println("imagePath : " + imagePath);
		for (Map<String, Object> map : ResultData) {
			map.put("image", base64Image);
		}
		response.put("success", true);
		response.put("data", ResultData);

		return response;
	}

	public Map<String, Object> EmpUpdate(byte[] fileData, String fileName, String PhoneNum, String FirstName,
			String LastName, String Email, String DateofBirth, String Skills, String Gender, String EmpId) {
		Map<String, Object> response = new HashMap<String, Object>();
		response.put("success", false);
		response.put("message", "Invalid inputs");

		try {
			LocalDate currentDate1 = LocalDate.now();
			DateTimeFormatter formatter = DateTimeFormatter.ofPattern("dd/MM/yyyy");
			String currentDate = currentDate1.format(formatter);

//			String username = FirstName.substring(0, 1) + LastName;
//			String image = username;
//			String fileExtension = fileName.substring(fileName.lastIndexOf('.'));
//
//			fileName = image + fileExtension;
//
//			String image_path = "D:\\profile_images\\" + fileName;
//
//			Files.write(Path.of(image_path), fileData, StandardOpenOption.CREATE, StandardOpenOption.WRITE);

//folder--------------------->	
//			
			String username = FirstName.substring(0, 1) + LastName;

			LocalDate dayDate = LocalDate.now();
			System.out.println(dayDate);
			int year=dayDate.getYear();
			int day = dayDate.getDayOfMonth();
			System.out.println(year);
			String[] month = {"jan", "feb", "mar", "april", "may", "jun", "july", "aug", "sep", "oct", "nov", "dec"};
			String months = month[LocalDate.now().getMonthValue() - 1];
			System.out.println(months); 
			 String dateDay ="Day"+day;
			 System.out.print(dateDay);
//			String image_name=username + ""+ dayDate+ "" +year;
			LocalTime currentTime = LocalTime.now();
			int minutes = currentTime.getMinute();
			String image=username +"STD"+dayDate+""+minutes;
			String fileExtension = fileName.substring(fileName.lastIndexOf('.'));

			fileName = image + fileExtension;
			String folderPath= env.getProperty("file.path.url");
			System.out.println(folderPath);
			Path folder =Path.of(folderPath+year+"\\"+months+"\\"+dateDay);
			System.out.println("folder path"+folder);
			Files.createDirectories(folder);
			String image_path=folder+"\\"+fileName;
		    Files.write(Path.of(image_path), fileData, StandardOpenOption.CREATE, StandardOpenOption.WRITE);

			
			
			String sql = "update employee_data set firstName=?,lastName=?, dateOfBirth=?, gender=?, skills=?, email=?, modifyDate=?, phoneno=?, image=? where empID=?";
			int k = jdbctemp.update(sql, FirstName, LastName, DateofBirth, Gender, Skills, Email, currentDate, PhoneNum,
					image_path, EmpId);
			if (k > 0) {
				response.put("success", true);
				response.put("message", "sucessfully updated!!!" + sql);

			} else {
				response.put("message", " failed to update data!!!" + sql);
			}
		} catch (Exception e) {
			response.put("message", e);
		}
		return response;

	}
// login------------------------->
	
	
	@Autowired
	private Authentication gen;
	public Map<String, Object> EmpLogin(EmpRegistrationPojo emp) throws IOException {
		Map<String, Object> response = new HashMap<String, Object>();
		response.put("success", false);
		response.put("message", "Invalid inputs");
		String LoginId = emp.getEmail();
		String LoginPass = emp.getPassword();
		System.out.println(LoginId);

		PasswordEncoder passwordEncoder = new BCryptPasswordEncoder();
//empID, firstName, lastName, dateOfBirth, gender, skills, password, email, createdBy, createdDate, modifyDate, phoneno, image
		String sql = "select empID,firstName,lastName,password,email,image from employee_data where email=?";
		List<Map<String, Object>> ResultData = jdbctemp.queryForList(sql, LoginId);
      List<Map<String,Object>> Result=new ArrayList<>();
//      Result.addAll(ResultData);
		
		System.out.println(Result);
		Map<String, Object> userData = ResultData.get(0);
		String passd = (String) userData.get("password");
		boolean isMatch = passwordEncoder.matches(LoginPass, passd);
		System.out.println("Password Matches: " + isMatch);

		String imagePath = (String) userData.get("image");
		Path path = Paths.get(imagePath);
		byte[] imageBytes = Files.readAllBytes(path);
		String base64Image = Base64.getEncoder().encodeToString(imageBytes);

		System.out.println("imagePath : " + imagePath);
		for (Map<String, Object> map : ResultData) {
			map.put("image", base64Image);
		}

		System.out.println(Result);
		if (isMatch) {
			response.put("success", true);
			response.put("message", "Logined successfully !!!");
			response.put("data", ResultData);
			String token =gen.generateKey(emp.getEmail() ,Result);
			System.out.println(token);
			response.put("token",token);
		
		} else {
			response.put("success", false);
			response.put("message", "Logined failed !!!");

		}
		return response;
	
	}
//
//	 
//-------------------mail--------------------------------------------->

	@Autowired
	JavaMailSender jms;
	int otp;

	public Map<String, Object> sendMail(EmpRegistrationPojo emp) {
		Map<String, Object> response = new HashMap<String, Object>();
		response.put("success", false);
		response.put("message", "no mail sent");
		try {

			String email = emp.getEmail();
			String sqlData = "select * from employee_data where email=?";
			List<Map<String, Object>> empData = jdbctemp.queryForList(sqlData, email);

			if (empData.isEmpty()) {
				response.put("message", "This email not registered with any account!!!");

				return response;
			} else {
				empemail = email;
				SimpleMailMessage sm = new SimpleMailMessage();
				int min = 1111;
				int max = 9999;
				otp = (int) (Math.random() * (max - min + 1) + min);

				System.out.println(otp);

				sm.setFrom("kanapareddyjeevitha2003@gmail.com");
				sm.setTo(empemail);
				System.out.print(empemail);
				sm.setText("Your ONE TIME PASSWORD is " + otp + ". Don't share with any one.");
				sm.setSubject("Reset password OTP");
				jms.send(sm);
				response.put("success", true);
				response.put("message", "Otp sending successfully");
//response.put("data",empData);
				response.put("data", otp);
			}
		} catch (Exception e) {
			response.put("message", "error" + e);
		}

		return response;
	}

//--------------otp verify------------------->

	public Map<String, Object> otpVerify(EmpRegistrationPojo emp) {
		Map<String, Object> response = new HashMap<String, Object>();
		response.put("success", false);
		response.put("message", "invalid data");
		System.out.println(emp.getOtp() + "otp gen" + emp.getGotp());
//	   String otp1=""+otp;
		String otp1 = emp.getGotp();
		if (emp.getOtp().equals(otp1)) {
			response.put("success", true);
			response.put("message", "verified");
		} else {
			response.put("message", "not verified");
		}
		return response;
	}

//reset=-------------------------->   

	public Map<String, Object> Reset(EmpRegistrationPojo emp) {
		Map<String, Object> response = new HashMap<String, Object>();
		response.put("success", false);
		response.put("message", "invalid data");

		if (emp.getPass().equals(emp.getCpass())) {

			PasswordEncoder passwordEncoder = new BCryptPasswordEncoder();
			String encodedPassword = passwordEncoder.encode(emp.getPass());

			System.out.println(emp.getEmail());
			String sql = "update employee_data set password=? where email=?";
			int k = jdbctemp.update(sql, encodedPassword, emp.getEmail());
			if (k > 0) {
				response.put("success", true);
				response.put("message", "sucessfully updated!!!" + sql);
				response.put("message", "pasword reset successfully");

			} else {
				response.put("message", " failed to update data!!!" + sql);
				// response.put("message"," error to reset pasword successfully");
			}
		} else {
			response.put("message", " error to reset pasword ");
		}
		return response;
	}

	

	
//-------change password------------>

}
