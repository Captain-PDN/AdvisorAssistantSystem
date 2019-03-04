สมาชิก
รหัสนิสิต      ชื่อ                             github username
5910400312  witsuta onampai                 witsutaon
5910401149  Ratchanon Bualeesonsakun        RatchanonBua
5910406191  Nalinee Phuangkhia              MindNa
5910406272  Pongdanai Nilmanee              Captain-PDN

วิธีการติดตั้ง
1. สร้าง user สำหรับ database โดยสร้างจาก เมนูdatabase ของ laragon ใช้ชื่อว่า Captain และ รหัส 4360 มีสิทธิการทำงาน SELECT CREATE DELETE DROP INSERT REFFERENCES UPDATE
2. สร้าง database จาก terminal ของ laragon โดยใช้ไฟล์ Database/databaseAll.sql ด้วยคำสั่ง source databaseAll.sql หลังจากล็อคอินแล้ว
3. สามารถตั้งค่า user และ password ของ Admin ได้ จากในไฟล์ databaseAll.sql เป็นเบื้องต้น (มี user : Admin, password : Admin เป็นรหัสพื้นฐาน)
4. การใช้งาน เริ่มใช้งานที่ไฟล์ preLogin.php หรือ ผ่านลิงค์ http://localhost/MidtermProject/view/login/preLogin.php
5. การใช้งานในระบบ advisor / student แนะนำให้ใช้ผ่านโหมด incognito mode ในกรณีที่ โหมดปกติมีการ login อีเมลอื่นอยู่
6. ไฟล์ studentsList.csv เป็นตัวอย่างอินพุตไฟล์ สำหรับทดสอบการเพิ่มนักเรียนเข้าระบบผ่านไฟล์ มีฟอร์แมตตามตัวอย่างข้อมุลภายในไฟล์ แนะนำให้แยกโฟลเดอร์ ก่อนทำการทดลองใช้งาน
7. การเพิ่มอีเมลสำหรับใช้งานในส่วนของนักเรียนและอาจารย์ สามารถเพิ่มได้จากหน้าเวปไซต์ในส่วนของแอดมิน หรือจากในไฟล์ databaseAll.sql

หมายเหตุ
ระบบของเวปไซต์ยังมีส่วนที่ไม่สมบูรณ์ซึ่งอาจแสดงผลไม่ถูกต้องได้