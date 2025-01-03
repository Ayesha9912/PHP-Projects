//select queries
"SELECT * FROM `cruds` WHERE id=$id AND name='Ayesha' Order By DESC";
//Update Query
"UPDATE `crud` SET name='Ayesha' WHERE id=2"
//Delete Query
"DELETE FROM `crud` WHERE id=$id";
it is sometime dangerous so use it very clearly
soft_read is another option for safe-use and also cancel

Never add all details in one table use multiple table

Now we can connect them by Join

//Example
table-one 
Item_Master
Item_ID(primary Key) 

Green Onion (1)
Onion(2) id never get repeat


Table-two
Pro_Master
Item_ID(Primary kay)


Select Item_master * , Pro_MAster from Item_master Inner Jion Pro_master ON Item_master.Item_ID = Pro_master.Item_ID;


//Now Create a Table through Query

CREATE TABLE `user` (
    pO_NO TEXT (10),
    Po_date datetime null,
    supplier_name varchar(50),
    total_amount numeric(10)
    status varchar (10)
)
//Now Insert the values in the table
INSERT INTO `USER` (po_no, supplier_name, total_amount) VALUES (1, "Ayesha" , 1000);




