package com.example.demo.Registeration;


import java.time.LocalDate;
import java.time.format.DateTimeFormatter;
import java.util.HashMap;
import java.util.List;
import java.util.ArrayList;
import java.util.Map;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.stereotype.Service;

@Service
public class empService {


	@Autowired
	JdbcTemplate jdbctemp;
	
	String fname="",lname="",dob="",gender="",skills="",email="",phone="";
	public Map<String,Object> EmpUpdate1(EmpRegistrationPojo emp){
		Map<String,Object> response=new HashMap<String, Object>();
		response.put("success", false);
		response.put("message", "Invalid inputs");
		
		try {
			LocalDate currentDate1 = LocalDate.now();
	        DateTimeFormatter formatter = DateTimeFormatter.ofPattern("dd/MM/yyyy");
	        String currentDate = currentDate1.format(formatter);
		 //, lastName, dateOfBirth, gender, skills, password, email, createdBy, createdDate, modifyDate, phoneno
	    	String sql1="select * from employee_data where empID=?";
	    	List<Map<String,Object>> ResultData=jdbctemp.queryForList(sql1,emp.getEmpId());
	        
	    	for(Map<?, ?> fetch:ResultData) {
	        	fname= (String) fetch.get("firstName");
	        	lname= (String) fetch.get("lastName");
	        	dob=   (String) fetch.get("dateOfBirth");
	        	gender=(String) fetch.get("gender");
	        	skills=(String) fetch.get("skills");
	        	email=(String) fetch.get("email");
	        	phone=(String) fetch.get("phoneno");
	        }
	    	
	    	if(!fname.equals(emp.getFirstName()) || !lname.equals(emp.getLastName()) || !dob.equals(emp.getDateofBirth()) || !gender.equals(emp.getGender()) || !phone.equals(emp.getPhoneNum()) || !email.equals(emp.getEmail())) {
	    	
	    String sql="update employee_data set firstName=?,lastName=?, dateOfBirth=?, gender=?, skills=?, email=?, modifyDate=?, phoneno=? where empID=?";
		int k=jdbctemp.update(sql,emp.getFirstName(),emp.getLastName(),emp.getDateofBirth(),emp.getGender(),emp.getSkills(),emp.getEmail(),currentDate,emp.getPhoneNum(),emp.getEmpId());
	    if(k>0) {
	    	response.put("success",true);
	    	response.put("message","sucessfully updated!!!");
	    	
	    }else {
	    	response.put("message"," failed to update data!!!");
	    }
	    	}else {
	    		response.put("message"," not updated !!!");
	    	}
		}catch(Exception e) {
			response.put("message",e);
		}
	 return response;

	}
	
	public Map<String,Object> Search(String name){
		Map<String,Object> response=new HashMap<String, Object>();
		 List<Map<String,Object>> ResultData=new ArrayList<Map<String, Object>>();
		response.put("success", false);
		response.put("message", "Invalid inputs");
		response.put("data", "");
        
	String sql="select * from employee_data where 1+0=1";
	
	  System.out.println(name);
	 
	  if(name!=null) {
    	String  sql1=sql+" and empID Like'"+name+"%'";
    	System.out.print(sql1+" ");
    	 ResultData = jdbctemp.queryForList(sql1);
    	  if(ResultData.isEmpty()) {
    		 String sql2=sql+" and email Like'"+name+"%'";
    	    	System.out.print(sql2+" ");

    		 ResultData = jdbctemp.queryForList(sql2);  
    		 if(ResultData.isEmpty()) {
    			 String sql3=sql+" and firstName Like'"+name+"%'";
    		    	System.out.print(sql3+" ");

    			 ResultData = jdbctemp.queryForList(sql3);  
    		 }}}
      
     
     if(!ResultData.isEmpty()) {
    	response.put("success", true);
		response.put("message", "fetch data");
		response.put("data",ResultData);
		
	}
         return response;
	}
}