-- Tạo cơ sở dữ liệu
CREATE DATABASE IF NOT EXISTS DatVeXe;
USE DatVeXe;

-- Tạo bảng TaiKhoans
CREATE TABLE TaiKhoans (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255),
    password VARCHAR(255),
    phoneNum VARCHAR(255),
    fullName VARCHAR(255),
    dob VARCHAR(255),
    isMale BOOLEAN,
    imageAccount VARCHAR(255),
    isAdmin BOOLEAN,
    isVerified BOOLEAN,
	isCarCompany BOOLEAN,
    createdAt DATETIME ,
    updatedAt DATETIME 
);

-- Tạo bảng NhaXes
CREATE TABLE NhaXes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT,
    phoneNo JSON,
    address JSON,
    policy TEXT,
    mainRoute JSON,
    startTime JSON,
    numOfTrip VARCHAR(255),
    ticketPrice JSON,
    stars FLOAT,
    imageCarCom VARCHAR(255),
    imageJours JSON,
	managerId INT UNIQUE,
    createdAt DATETIME ,
    updatedAt DATETIME ,
	FOREIGN KEY (managerId) REFERENCES TaiKhoans(id)
);

-- Tạo bảng LoaiXes
CREATE TABLE LoaiXes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    createdAt DATETIME ,
    updatedAt DATETIME 
);

-- Tạo bảng ChuyenXes
CREATE TABLE ChuyenXes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    startProvince VARCHAR(255),
    endProvince VARCHAR(255),
	routeProvinces JSON,
    startLocation VARCHAR(255),
    endLocation VARCHAR(255),
    startDate VARCHAR(255),
    endDate VARCHAR(255),
    startTime VARCHAR(255),
    endTime VARCHAR(255),
    locationImage VARCHAR(255),
    numSeats INT,
    totalNumSeats INT,
    price DECIMAL(10, 2),
    carId INT,
    cateCarId INT,
    createdAt DATETIME ,
    updatedAt DATETIME ,
    FOREIGN KEY (carId) REFERENCES NhaXes(id),
    FOREIGN KEY (cateCarId) REFERENCES LoaiXes(id)
);

-- Tạo bảng VeDaDats
CREATE TABLE VeDaDats (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numSeats INT,
    statusTicket VARCHAR(255),
    email VARCHAR(255),
    phoneNum VARCHAR(255),
    fullName VARCHAR(255),
    jourId INT,
    accId INT,
    createdAt DATETIME ,
    updatedAt DATETIME ,
	seatCodes JSON,
    FOREIGN KEY (jourId) REFERENCES ChuyenXes(id),
    FOREIGN KEY (accId) REFERENCES TaiKhoans(id)
);

-- Tạo bảng Reviews
CREATE TABLE Reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    stars FLOAT,
    comment TEXT,
    accId INT,
    carId INT,
	veId INT,
    createdAt DATETIME ,
    updatedAt DATETIME ,
    FOREIGN KEY (accId) REFERENCES TaiKhoans(id),
    FOREIGN KEY (carId) REFERENCES NhaXes(id),
	FOREIGN KEY (veId) REFERENCES VeDaDats(id)
);

