package com.example.demo.Config;
import java.sql.Date;
import java.io.IOException;
import java.nio.file.AccessDeniedException;
import java.util.Base64;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import org.springframework.stereotype.Component;
import org.springframework.web.servlet.HandlerInterceptor;

import io.jsonwebtoken.Claims;
import io.jsonwebtoken.JwtException;
import io.jsonwebtoken.Jwts;
import io.jsonwebtoken.SignatureAlgorithm;
import io.jsonwebtoken.security.Keys;

import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

@Component
public class Authentication implements HandlerInterceptor  {
	private static String secret;
	  public static final long JWT_TOKEN_VALIDITY = 5 * 60 * 60;
	    @SuppressWarnings("deprecation")
		public String generateKey(String email, List<Map<String, Object>> result) {
	    	byte[] keyBytes = Keys.secretKeyFor(SignatureAlgorithm.HS512).getEncoded();
	    	secret = new String(Base64.getEncoder().encode(keyBytes));

	        Map<String, Object> claims = new HashMap<>();
	        for (Map<String, Object> item : result) {
	            for (Map.Entry<String, Object> entry : item.entrySet()) {
	                claims.put(entry.getKey(), entry.getValue());
	            }
	        }
	        return Jwts.builder()
	                .setClaims(claims)
	                .setSubject(email)
	                .setIssuedAt(new Date(System.currentTimeMillis()))
	                .setExpiration(new Date(System.currentTimeMillis() +JWT_TOKEN_VALIDITY * 1000))
	                .signWith(SignatureAlgorithm.HS512, secret)
	                .compact();
	    }
//	    public Claims verify(String authorization) throws Exception {
//
//	    	try {
//	    	@SuppressWarnings("deprecation")
//			Claims claims = Jwts.parser().setSigningKey(secret).parseClaimsJws(authorization).getBody();
//	    	System.out.println("claims : "+claims);
//	    	return claims;
//	    	} catch(Exception e) {
//	    	    throw new AccessDeniedException("Access Denied");
//	    	}
//	    	}

	    private static final String AUTHORIZATION_HEADER = "Authorization";
	    	
	    	@SuppressWarnings("deprecation")
			@Override
		
			public boolean preHandle(HttpServletRequest request, HttpServletResponse response, Object handler) throws Exception {
		        String token = request.getHeader(AUTHORIZATION_HEADER);

		        if (token != null) {
		            try {
		                Jwts.parser().setSigningKey(secret).parseClaimsJws(token.substring(0));
		                return true;
		            } catch (JwtException e) {
		                sendErrorResponse(response, HttpServletResponse.SC_UNAUTHORIZED, "Invalid token");
		                return false;
		            }
		        } else {
		            sendErrorResponse(response, HttpServletResponse.SC_UNAUTHORIZED, "Unauthorized");
		            return false;
		        }
		    }

		    private void sendErrorResponse(HttpServletResponse response, int statusCode, String message) throws IOException {
		        response.setStatus(statusCode);
		        response.setContentType("application/json");
		        
//		        String jsonError = "{\"error\": \"" + message + "\"}";
		        response.getWriter().write("{\"StatusCode\":"+statusCode+",\"error\": \"Unauthorized access\", \"message\": \"Invalid token provided\"}");

//		        response.getWriter().write(jsonError);
		        response.getWriter().flush();
		    }		
}






