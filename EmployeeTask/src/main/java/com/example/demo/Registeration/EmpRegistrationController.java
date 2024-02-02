package com.example.demo.Registeration;


import java.io.IOException;
import java.util.*;


import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestHeader;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;
import org.springframework.web.multipart.MultipartFile;

import com.example.demo.Config.Authentication;



@RestController
@CrossOrigin(origins = "*")
public class EmpRegistrationController {


//	 private static final Logger log1 = LogManager.getLogger(EmpRegistrationController.class);
	
	@Autowired
	EmpRegistrationService empReg;
	@Autowired
	empService e;
	
	
	@PostMapping("mail")
	public Map<?, ?> mail( @RequestBody  EmpRegistrationPojo empData ) {
        return empReg.sendMail(empData);
	}
	
	@PostMapping("login")
	public Map<String,Object> EmpLogin(@RequestBody EmpRegistrationPojo empData) throws IOException{
		 return empReg.EmpLogin(empData);
		 
		 
	}
	
	@PostMapping("employee")
public Map<String, Object> datainsertion(@RequestParam("file") MultipartFile file, @RequestParam("phoneNum") String PhoneNum, @RequestParam("firstName") String firstName, @RequestParam("lastName") String lastName, @RequestParam("email") String email, @RequestParam("password") String password, @RequestParam("dateofBirth") String dob, @RequestParam("skills") String skills, @RequestParam("gender") String gender) throws IOException{
	
	
		return empReg.EmpInsertData(file.getBytes(),file.getOriginalFilename(),PhoneNum , firstName, lastName, email, password, dob, skills, gender);
			 
		 }
		   
	
	@GetMapping("employees")
	public Map<?, ?> EmpView() {
		 return empReg.EmpView();
		
	}
	
	@Autowired 
	private Authentication gen;
	@GetMapping("employee/{empId}")
	public Map<?, ?> EmpIdView(@PathVariable  int empId ) throws Exception {
//		@RequestHeader(value = "authorization", defaultValue = "") String auth,
//		gen.verify(auth);
		return empReg.EmpIdView(empId);
	}
	
	@PostMapping("employees")
	
  public Map<?, ?> EmpUpdate( @RequestParam("file") MultipartFile file, @RequestParam("phoneNum") String PhoneNum, @RequestParam("firstName") String firstName, @RequestParam("lastName") String lastName, @RequestParam("email") String email,@RequestParam("dateofBirth") String dob, @RequestParam("skills") String skills, @RequestParam("gender") String gender, @RequestParam("empId") String empId) throws IOException{
		return empReg.EmpUpdate(file.getBytes(),file.getOriginalFilename(),PhoneNum , firstName, lastName, email,dob, skills, gender,empId) ;
//		log1.info("entered into EmpUpDate calling method block");
		
	}
	
//----------------mail---------------->
//	@PostMapping("mail")
//	
//	 public Map<?, ?> mail( @RequestBody  EmpRegistrationPojo empData ) {
//
//		return empReg.sendMail(empData);
//	}
	//-----------otp verify----------->

		@PostMapping("otp")
		
		 public Map<?, ?> otpVerify( @RequestBody  EmpRegistrationPojo empData ) {

			return empReg.otpVerify(empData);
		}
	
		//-----------passs----------->

				@PostMapping("pass")
				
				 public Map<?, ?>pass( @RequestBody  EmpRegistrationPojo empData ) {

					return empReg.Reset(empData);
				}
	@PostMapping("emp")
	
	  public Map<?, ?> EmpUpdate1( @RequestBody  EmpRegistrationPojo empData ) {
//			log1.info("entered into EmpUpDate calling method block");
			return e.EmpUpdate1(empData);
		}
	
	
	

	@GetMapping("emp-search/{name}")
	
	  public Map<?, ?> Search(@PathVariable String name ) {
		
			return e.Search(name);
		}
	
	
	






///-----------------------------file create test----------------------------------------->

//@PostMapping("f")
//
//public Map<?,?> file(@RequestPart("file") MultipartFile file) throws Exception{
//
//		return e.file(file.getBytes());
//	
//
//}
	
}



