<?php
//member 정보 class
class Member {
    private $id;
    private $name;
    private $password;
    private $email;
    private $phoneNumber;
    private $homeNumber;
    private $postcode;
    private $address;
    private $detailAddress;
    private $sendSMS;
    private $sendEmail;
    private $inserted;

    //생성자
    public function __construct($id) {
        $this->id = $id;
    }

    // Getter 메서드
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPhoneNumber() {
        return $this->phoneNumber;
    }

    public function getHomeNumber() {
        return $this->homeNumber;
    }

    public function getPostcode() {
        return $this->postcode;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getDetailAddress() {
        return $this->detailAddress;
    }

    public function getSendSMS() {
        return $this->sendSMS;
    }

    public function getSendEmail() {
        return $this->sendEmail;
    }

    public function getInserted() {
        return $this->inserted;
    }

    // Setter 메서드
    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPhoneNumber($phoneNumber) {
        $this->phoneNumber = $phoneNumber;
    }

    public function setHomeNumber($homeNumber) {
        $this->homeNumber = $homeNumber;
    }

    public function setPostcode($postcode) {
        $this->postcode = $postcode;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setDetailAddress($detailAddress) {
        $this->detailAddress = $detailAddress;
    }

    public function setSendSMS($sendSMS) {
        $this->sendSMS = $sendSMS;
    }

    public function setSendEmail($sendEmail) {
        $this->sendEmail = $sendEmail;
    }

    public function setInserted($inserted) {
        $this->inserted = $inserted;
    }
}
