# Advisor Assistant System

#### **Contributers**

5910400312  Witsuta Onampai                 (witsutaon)

5910401149  Ratchanon Bualeesonsakun        (RatchanonBua)

5910406191  Nalinee Phuangkhia              (MindNa)

5910406272  Pongdanai Nilmanee              (Captain-PDN)

##### How to Install
1. สร้าง User สำหรับ Database โดยสร้างจาก เมนู Database ของ Laragon ใช้ชื่อว่า Captain และ รหัสผ่าน 4360 มีสิทธิการทำงาน SELECT CREATE DELETE DROP INSERT REFFERENCES UPDATE
2. สร้าง Database จาก Terminal ของ Laragon โดยใช้ไฟล์ database/databaseAll.sql ด้วยคำสั่ง source databaseAll.sql หลังจากล็อคอินแล้ว
3. สามารถตั้งค่า User และ Password ของ Admin ได้ จากในไฟล์ databaseAll.sql เป็นเบื้องต้น (มี User : Admin, Password : Admin เป็นรหัสพื้นฐาน)
4. การใช้งาน เริ่มใช้งานที่ไฟล์ preLogin.php หรือ ผ่านลิงค์ http://localhost/AdvisorAssistantSystem/views/loginPages/preLogin.php
5. การใช้งานในระบบ Advisor / Student แนะนำให้ใช้ผ่านโหมด Incognito Mode ในกรณีที่ โหมดปกติมีการ Login อีเมลอื่นอยู่
6. ไฟล์ studentsList.csv เป็นตัวอย่างอินพุตไฟล์ สำหรับทดสอบการเพิ่มนักเรียนเข้าระบบผ่านไฟล์ มีฟอร์แมตตามตัวอย่างข้อมูลภายในไฟล์ แนะนำให้แยกโฟลเดอร์ ก่อนทำการทดลองใช้งาน
7. การเพิ่มอีเมลสำหรับใช้งานในส่วนของนักเรียนและอาจารย์ สามารถเพิ่มได้จากหน้าเว็ปไซต์ในส่วนของแอดมิน หรือจากในไฟล์ databaseAll.sql

**หมายเหตุ**
ระบบของเว็ปไซต์ยังมีส่วนที่ไม่สมบูรณ์ซึ่งอาจแสดงผลไม่ถูกต้องได้