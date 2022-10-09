USE assetsdb;
DROP TABLE IF EXISTS assets;
CREATE TABLE assets (
  assetID INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  assetType varchar(255) NOT NULL,
  brand varchar (255) NOT NULL,
  modelno varchar (255) NOT NULL,
  serialno varchar (255) NOT NULL,
  datepurchased varchar (255) NOT NULL,
  location varchar (255) NOT NULL
);

INSERT INTO assets (assetType, brand, modelno, serialno, datepurchased, location) VALUES ('CPU','Dell','Optiplex 780', 'DGK8H63','2022/08/28','Level 1');
INSERT INTO assets (assetType, brand, modelno, serialno, datepurchased, location) VALUES ('Mouse','Lenovo','M-U0025-O', 'LZ123330BGC','2022/06/21','Level 2');
INSERT INTO assets (assetType, brand, modelno, serialno, datepurchased, location) VALUES ('CPU','Dell','XPS 8940', 'WXA8H63','2021/06/09','Level 1');
