<?php
session_start();

//session에 저장되는 값 목록
//result : 로그인 실패 -> fail, 로그인 성공 success
//memberId : 회원의 기본키
//username : 회원의 아이디
//password : 비밀번호
//authorityId : 관리자 로그인 시 관리자 기본키
//veriCode : 인증번호 저장됨