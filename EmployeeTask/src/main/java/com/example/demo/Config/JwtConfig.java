package com.example.demo.Config;

import org.springframework.context.annotation.Configuration;
import org.springframework.web.servlet.config.annotation.InterceptorRegistry;
import org.springframework.web.servlet.config.annotation.WebMvcConfigurer;


	@Configuration
	public class JwtConfig implements WebMvcConfigurer {

	@Override
	public void addInterceptors(InterceptorRegistry registry) {
	registry.addInterceptor(new Authentication())
	        .addPathPatterns("/**")
	        .excludePathPatterns("/login","/mail","/otp","/employee", "/pass" );
	
	}
	}
	
	
