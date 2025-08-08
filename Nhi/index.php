<?php  
session_start(); // Thêm dòng này để bắt đầu hoặc tiếp tục session
// Tệp này chỉ chứa logic xử lý bình luận, không có HTML  
include 'db.php';   
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Yến Nhi - Dạy nhạc</title>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500;700&display=swap" rel="stylesheet">
  <!-- Link Font Awesome để hiện icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
 <a href="#" onclick="showPage('home', this)" class="footer-logo">Yến Nhi</a>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <!-- Header -->
  <header class="main-header">
  <!-- Nút ☰ chỉ hiện trên mobile -->
  <button class="menu-btn" onclick="toggleMenu()">☰</button>

  <!-- Tiêu đề chỉ hiện trên mobile -->
  <h3 id="headerTitle">Trang chủ</h3>

  <!-- Menu desktop -->
   <nav class="nav-desktop">
        <a href="#" onclick="showPage('home', this)" class="nav-link active">Trang chủ</a>
        <a href="#" onclick="showPage('class', this)" class="nav-link">Lớp học nhạc lý</a>
        <a href="#" onclick="showPage('about', this)" class="nav-link">Giới thiệu</a>
        <a href="#" onclick="showPage('contact', this)" class="nav-link">Liên hệ</a>
        
        
        <?php if (isset($_SESSION['username'])): ?>
            <a href="logout.php" class="nav-link">Đăng xuất</a>
        <?php else: ?>
            <a href="login.php" class="nav-link">Đăng nhập</a>
        <?php endif; ?>
    </nav>
</header>

<!-- Menu mobile: tách ra khỏi header để dễ xử lý -->
<nav class="side-menu" id="sideMenu">
  <button class="close-btn" onclick="toggleMenu()">×</button>
  <a href="#" onclick="showPage('home', this)" class="nav-link">Trang chủ</a>
  <a href="#" onclick="showPage('class', this)" class="nav-link">Lớp học nhạc lý</a>
  <a href="#" onclick="showPage('about', this)" class="nav-link">Giới thiệu</a>
  <a href="#" onclick="showPage('contact', this)" class="nav-link">Liên hệ</a>
  <?php if (isset($_SESSION['username'])): ?>
            <a href="logout.php" class="nav-link">Đăng xuất</a>
        <?php else: ?>
            <a href="login.php" class="nav-link">Đăng nhập</a>
        <?php endif; ?>
</nav>

  <!-- Home Section -->
  <section class="intro show" id="home">
    <h1>Xin chào,</h1>
    <h2>Mình là <span class="name">Yến Nhi</span></h2>
    <p class="role">Guitarist | Songwriter | Drummer | Pianist</p>
    <p class="org">CO-FOUNDER @ <strong>VYN.EDU</strong></p>
    <div class="center">
      <img src="Nhicute.jpg" width="200" alt="Yến Nhi" onerror="this.src='https://via.placeholder.com/200'">
      <p>Yến Nhi xin chào</p>
      <a href="#" class="button" onclick="showPage('class')">Vào lớp học nhạc lý</a>
    <div class="music-container">
  <div class="music-block" onclick="showPage('origin')">
    <img src="miusic.jpg" alt="Âm nhạc" class="music-image">
    <h2>Khám phá âm nhạc</h2>
  </div>
  <div class="music-block" onclick="showPage('difficulty')">
    <img src="https://cdn-icons-png.flaticon.com/512/3176/3176278.png"
         alt="Học âm nhạc khó không?" class="music-image">
    <h2>Học âm nhạc khó không?</h2>
  </div>

  <div class="music-block" onclick="showPage('violin')">
    <img src="51w9t5wMPEL._UF894,1000_QL80_.jpg" 
         alt="Violin" class="music-image">
    <h2>Khám phá violin</h2>
    <p class="music-desc"></p>
  </div>
  <div class="music-block" onclick="showPage('piano')">
  <img src="CVP-909GP_a_0001_be75d0651521d3c802232c926850ca0d.webp" alt="Piano" class="music-image">
  <h2>Khám phá piano</h2>
  </div>
  <div class="music-block" onclick="showPage('guitar')">
  <img src="Tanglewood-ts3-450x471.png" alt="Guitar" class="music-image">
  <h2>Khám phá guitar</h2>
  </div>

</div>
<!-- Audio -->
<audio id="bg-music" autoplay loop>
  <source src="【Piano Cover】Youngso Kim - Like a Star(Piano Ver.)｜超好聽鋼琴版｜觸動心弦的旋律.mp3" type="audio/mpeg">
</audio>

<!-- Nút bật/tắt -->
<button id="toggle-music">🔊 Tắt nhạc</button>

</section>
<section id="violin" class="instrument-detail" style="display: none;">
  <h1>🎻 Khám Phá Violin</h1>
  <img src="51w9t5wMPEL._UF894,1000_QL80_.jpg" width="400" alt="Violin" class="instrument-image">
  <br>
  <p><strong>Violin</strong> là một nhạc cụ dây thuộc họ vĩ cầm, nổi bật với âm thanh tinh tế và khả năng biểu đạt cảm xúc sâu sắc.</p>

  <h2>📜 Lịch sử và văn hóa</h2>
  <p>Xuất hiện từ thế kỷ 16 tại Ý, violin được hoàn thiện bởi các nghệ nhân như Antonio Stradivari. Nó là biểu tượng của âm nhạc cổ điển châu Âu, được sử dụng trong dàn nhạc giao hưởng, thính phòng, và cả nhạc jazz, folk, pop. Ở Việt Nam, violin phổ biến từ thời Pháp thuộc và là một phần quan trọng trong giáo dục âm nhạc.</p>

  <h2>🔍 Cấu tạo</h2>
  <ul>
    <li><strong>Thân đàn</strong>: Làm từ gỗ thông (mặt trước) và gỗ thích hoặc hồng sắc (mặt sau, hông).</li>
    <li><strong>Dây đàn</strong>: 4 dây (G, D, A, E), thường làm từ thép hoặc ruột động vật (gut).</li>
    <li><strong>Vĩ</strong>: Gậy gỗ với lông ngựa để kéo trên dây.</li>
    <li><strong>Ngựa đàn</strong>: Truyền dao động từ dây đến thân đàn.</li>
    <li><strong>Hồn đàn</strong>: Thanh gỗ nhỏ bên trong, tăng cường âm thanh.</li>
  </ul>

  <h2>🎵 Âm sắc và vai trò</h2>
  <p>Violin có âm thanh sáng, trong trẻo, và giàu cảm xúc. Nó thường dẫn dắt giai điệu trong dàn nhạc giao hưởng, biểu diễn solo trong các concerto, hoặc xuất hiện trong nhạc dân gian và đương đại.</p>

  <h2>💡 Mẹo học violin</h2>
  <ul>
    <li>Rèn luyện tư thế cầm vĩ và đặt đàn đúng để tránh đau mỏi.</li>
    <li>Luyện tai bằng cách nghe các bản nhạc violin cổ điển.</li>
    <li>Sử dụng tuner hoặc ứng dụng để đảm bảo âm chuẩn.</li>
    <li>Tập luyện đều đặn với các bài tập ngón cơ bản.</li>
  </ul>
  <br>
  <a href="#" class="back-home" onclick="showPage('home')">← Quay về trang chủ</a>
</section>
<section id="piano" class="instrument-detail" style="display: none;">
  <h1>🎹 Khám Phá Piano</h1>
  <img src="CVP-909GP_a_0001_be75d0651521d3c802232c926850ca0d.webp" alt="Piano" width="400" class="instrument-image">
  <br>
  <p><strong>Piano</strong> là một nhạc cụ phím thuộc họ dây, được mệnh danh là "vua của các nhạc cụ" nhờ sự linh hoạt và âm thanh phong phú.</p>

  <h2>📜 Lịch sử và văn hóa</h2>
  <p>Được phát minh bởi Bartolomeo Cristofori vào khoảng năm 1700, piano trở thành nhạc cụ không thể thiếu trong âm nhạc cổ điển. Nó gắn liền với các tác phẩm của Mozart, Beethoven, và là biểu tượng của sự sang trọng. Ở Việt Nam, piano phổ biến trong giáo dục âm nhạc và các buổi hòa nhạc, với những nghệ sĩ như Đặng Thái Sơn làm rạng danh đất nước.</p>

  <h2>🔍 Cấu tạo</h2>
  <ul>
    <li><strong>Khung</strong>: Làm từ gang để chịu lực căng của dây.</li>
    <li><strong>Dây đàn</strong>: Hàng trăm dây thép tạo ra các nốt nhạc.</li>
    <li><strong>Bàn phím</strong>: 88 phím (52 phím trắng, 36 phím đen).</li>
    <li><strong>Búa</strong>: Gõ vào dây khi nhấn phím để tạo âm thanh.</li>
    <li><strong>Bàn đạp</strong>: Bao gồm pedal duy trì, giảm âm, và vang.</li>
    <li><strong>Hộp cộng hưởng</strong>: Khuếch đại âm thanh từ dây.</li>
  </ul>

  <h2>🎵 Âm sắc và vai trò</h2>
  <p>Piano có âm thanh phong phú, từ mềm mại đến mạnh mẽ, phù hợp cho biểu diễn solo, đệm nhạc, và sáng tác. Nó là trung tâm của nhiều thể loại âm nhạc, từ cổ điển đến jazz và pop.</p>

  <h2>💡 Mẹo học piano</h2>
  <ul>
    <li>Học cách đặt tay đúng để tránh căng cơ.</li>
    <li>Tập các bài tập ngón (Hanon, Czerny) để tăng độ linh hoạt.</li>
    <li>Sử dụng metronome để giữ nhịp ổn định.</li>
    <li>Nghe các bản nhạc piano nổi tiếng để cảm nhận phong cách.</li>
  </ul>
  <br>
  <a href="#" class="back-home" onclick="showPage('home')">← Quay về trang chủ</a>
   </div>
</section>
<section id="guitar" class="instrument-detail" style="display: none;">
  <h1>🎸 Khám Phá Guitar</h1>
  <br>
  <img src="Tanglewood-ts3-450x471.png" width="400" alt="Guitar" class="instrument-image">
  <p><strong>Guitar</strong> là một nhạc cụ dây phổ biến, được yêu thích nhờ tính di động và khả năng biểu diễn đa dạng.</p>

  <h2>📜 Lịch sử và văn hóa</h2>
  <p>Có nguồn gốc từ các nhạc cụ dây thời Trung cổ, guitar hiện đại được định hình bởi Antonio de Torres vào thế kỷ 19. Guitar điện ra đời vào những năm 1930 đã cách mạng hóa nhạc rock và pop. Ở Việt Nam, guitar là nhạc cụ quen thuộc trong nhạc trẻ, acoustic, và các phong trào học đường.</p>

  <h2>🔍 Cấu tạo</h2>
  <ul>
    <li><strong>Thân đàn</strong>: Làm từ gỗ thông (mặt trước) và gỗ gụ hoặc hồng sắc (mặt sau, hông).</li>
    <li><strong>Dây đàn</strong>: 6 dây (E, A, D, G, B, E), làm từ nylon hoặc thép.</li>
    <li><strong>Cần đàn</strong>: Có phím đàn để tạo các nốt khác nhau.</li>
    <li><strong>Ngựa đàn</strong>: Cố định dây vào thân đàn.</li>
    <li><strong>Đầu đàn</strong>: Chứa chốt chỉnh dây để điều chỉnh cao độ.</li>
    <li><strong>Pickup (guitar điện)</strong>: Thu âm thanh và truyền đến ampli.</li>
  </ul>

  <h2>🎵 Âm sắc và vai trò</h2>
  <p>Guitar có âm thanh đa dạng, từ ấm áp (guitar cổ điển) đến mạnh mẽ (guitar điện). Nó phù hợp cho biểu diễn solo, đệm hát, hoặc là linh hồn của các ban nhạc rock và pop.</p>

  <h2>💡 Mẹo học guitar</h2>
  <ul>
    <li>Học các hợp âm cơ bản (C, G, D, Am) trước tiên.</li>
    <li>Tập luyện ngón tay với các bài tập fingerstyle.</li>
    <li>Sử dụng capo để thay đổi tông dễ dàng.</li>
    <li>Chơi cùng metronome để giữ nhịp.</li>
  </ul>
  <br>
  <a href="#" class="back-home" onclick="showPage('home')">← Quay về trang chủ</a>
 <form id="commentForm">
        <input type="hidden" name="page_id" value="piano">
        <textarea name="comment" required placeholder="Nhập bình luận..."></textarea><br>
        <button type="submit">Gửi</button>
    </form>

    <h3>Danh sách bình luận:</h3>
    <div id="commentList">
        <!-- Comments sẽ load ở đây -->
    </div>


</section>
<section class="origin-section" id="origin" style="display: none;">
  <h1>Âm Nhạc Bắt Đầu Từ Đâu?</h1>
  <p>Âm nhạc là một trong những hình thức nghệ thuật cổ xưa nhất của nhân loại, bắt nguồn từ những âm thanh tự nhiên như tiếng chim hót, tiếng nước chảy, tiếng mưa rơi hay tiếng gõ đá.</p>
  <h2>1. Thời kỳ nguyên thủy</h2>
  <p>Con người thời tiền sử đã biết tạo ra âm thanh bằng cách đập đá, gõ gỗ, thổi vào ống trúc... để giao tiếp, cầu mưa hay dùng trong nghi lễ.</p>
  <h2>2. Âm nhạc trong văn minh cổ đại</h2>
  <p>Người Ai Cập, Hy Lạp, Trung Hoa cổ đại đã biết sáng tạo ra các nhạc cụ như đàn hạc, sáo trúc, trống... và ghi chép âm nhạc bằng các ký hiệu sơ khai.</p>
  <h2>3. Từ truyền miệng đến hệ thống</h2>
  <p>Trước khi có bản nhạc, âm nhạc được truyền miệng qua các thế hệ. Sau này, người ta phát minh ra hệ thống ký âm (như nốt nhạc) giúp ghi lại và phổ biến dễ dàng hơn.</p>
  <h2>4. Ý nghĩa của âm nhạc</h2>
  <p>Âm nhạc giúp kết nối con người, thể hiện cảm xúc, văn hóa và tinh thần. Dù ở bất kỳ nền văn minh nào, âm nhạc đều là một phần không thể thiếu.</p>
  <p class="thanks">Âm nhạc là một ngôn ngữ không lời — bắt đầu từ trái tim và chạm đến tâm hồn!</p>
  <a href="#" class="back-home" onclick="showPage('home')">← Quay lại trang chủ</a>
</section>
<section id="difficulty" class="terms-section" style="display: none;">
  <h1>Học Âm Nhạc Khó Không?</h1>

  <p>Đây là câu hỏi nhiều người mới bắt đầu thường đặt ra. Câu trả lời là: <strong>không khó nếu bạn có đam mê và phương pháp học đúng đắn</strong>.</p>

  <h2>1. Bắt đầu từ đâu?</h2>
  <p>Bạn có thể bắt đầu từ việc nghe nhạc, học các nốt cơ bản, hoặc làm quen với một nhạc cụ đơn giản như piano hoặc guitar.</p>

  <h2>2. Học lý thuyết âm nhạc</h2>
  <p>Hiểu nhịp, cao độ, âm giai và hợp âm sẽ giúp bạn tiến xa hơn trong việc biểu diễn hoặc sáng tác.</p>

  <h2>3. Học qua thực hành</h2>
  <p>Thực hành đều đặn, luyện tai và tham gia vào các lớp học sẽ giúp kỹ năng tiến bộ nhanh chóng.</p>

  <h2>4. Có nên lo lắng?</h2>
  <p>Không! Âm nhạc là hành trình thú vị và mỗi người sẽ có tốc độ riêng. Quan trọng là giữ vững cảm hứng!</p>

  <p class="thanks">Cố gắng mỗi ngày và bạn sẽ thấy học âm nhạc là một niềm vui không thể thiếu!</p>
  <br>
  <a href="#" class="back-home" onclick="showPage('home')">← Về trang chủ</a>
</section>

  <!-- About Section -->
  <section class="about-section" id="about">
    <h2>Giới thiệu</h2>
     <p>Mình là Yến Nhi - một người yêu âm nhạc, thích sáng tạo và chia sẻ. Mình chơi guitar, piano, trống và rất đam mê dạy nhạc cho người mới bắt đầu.</p>
    <p>Bên cạnh đó, mình là co-founder của <strong>VYN.EDU</strong>, nơi mình cùng bạn bè xây dựng một cộng đồng học nhạc tích cực, thân thiện.</p>
    <p>Mình là một người yêu âm nhạc, thích sáng tạo và chia sẻ...❤️</p>
    <div class="center">
      <img src="nhi-guitar.webp.webp" width="200" alt="Yến Nhi chơi guitar" onerror="this.src='https://via.placeholder.com/200'">
      <br>
      <a href="#" class="button" onclick="showPage('home')">Quay về trang chủ</a>
    </div>
  </section>

  <!-- Contact Section -->
 <section class="contact-section" id="contact">
  <h2>📬 Liên hệ với Yến Nhi</h2>
  <p class="contact-desc">Bạn muốn học nhạc hoặc hợp tác? Đừng ngại kết nối với mình qua các kênh bên dưới nha 💖</p>

  <ul class="contact-list">
    <li><i class="fas fa-envelope"></i> Email: <a href="mailto:yennhicutexinhgai@gmail.com">yennhicutexinhgai@gmail.com</a></li>
    <li><i class="fab fa-facebook-f"></i> Facebook: <a href="https://www.facebook.com/share/1AQcChEJ8F/" target="_blank">facebook.com/share/1AQcChEJ8F</a></li>
    <li><i class="fab fa-instagram"></i> Instagram: <a href="http://www.instagram.com/furinadefontaine.13.10" target="_blank">@furinadefontaine.13.10</a></li>
  </ul>

  <div class="contact-img-wrapper">
    <br>
     <img src="Nhi đẹp gái.jpg" width="300" alt="Yến Nhi đẹp gái" onerror="this.src='https://via.placeholder.com/300'">
  </div>
<br>
  <a href="#" class="button" onclick="showPage('home')">← Về trang chủ</a>
</section>


  <!-- Class Section -->
  <section class="class-section" id="class">
    <h2>Lớp học nhạc lý</h2>
    <p>Chào mừng đến với lớp nhạc lý cơ bản!, mình sẽ nói về:.</p>
          <ul>
        <li>7 nốt nhạc cơ bản (C D E F G A B)</li>
        <li>Cách hình thành gam trưởng và thứ</li>
        <li>Thực hành nhận diện nốt trên đàn guitar</li>
      </ul>
      <p><em>Mẹo nhỏ:</em> Hãy chơi gam C major trước rồi so sánh với các gam khác</p>
    <ul>
      <li><a href="#" onclick="showPage('lesson1')">Bài giảng 1: 7 Nốt Nhạc Cơ bản</a></li>
      <li><a href="#" onclick="showPage('lesson2')">Bài giảng 2: Âm giai cơ bản của 7 nốt nhạc</a></li>
      <li><a href="#" onclick="showPage('lesson3')">Bài giảng 3: Nhận diện nốt trên đàn guitar</a></li>
      <li><a href="#" onclick="showPage('lesson4')">Bài giảng 4: Cácc Bấm Hợp Âm và Các Thế Bấm</a></li>
      <li><a href="#" onclick="showPage('lesson5')">Bài giảng 5: Các Màu Hợp Âm</a></li>
      <li><a href="#" onclick="showPage('lesson6')">Bài giảng 6: Màu 7 Trong Hợp Âm</a></li>
      <li><a href="#" onclick="showPage('lesson7')">Bài 7: Thực hành và bài tập</a></li>
  </section>

  <!-- Lesson 1 -->
  <section class="lesson-section" id="lesson1">
    <span class="back-btn" onclick="showPage('class')">← Trở về danh sách</span>
    <h1>Bài giảng 1: 7 Nốt Nhạc Cơ Bản</h1>
    <h2>I. Giới thiệu</h2>
    <p>Trong âm nhạc phương Tây, tần số âm thanh được chia thành 12 nốt trong một quãng tám (chromatic scale): La, La thăng, Si, Đô, Đô thăng, Rê, Rê thăng, Mi, Pha, Pha thăng, Sol, Sol thăng.</p>
    <p>Ký hiệu quốc tế:</p>
    <p>A là La, B là Si, C là Đô, D là Rê, E là Mi, F là Pha, G là Sol.</p>
    <p><em>Ví dụ:</em> Như có 7 ngày trong tuần. Nếu có thêm "ngày phụ", mình có thể gọi là "Thứ Hai rưỡi" chứ không đặt tên riêng!</p>
    <p>Âm nhạc hiện đại vẫn dựa trên 7 nốt tự nhiên - nền tảng của âm giai, hợp âm, giai điệu.</p>

    <h2>II. Tên gọi 7 nốt nhạc</h2>
    <table>
      <tr>
        <th>Tên quốc tế</th>
        <th>Tên tiếng Việt</th>
        <th>Phát âm tiếng Anh</th>
      </tr>
      <tr><td>C</td><td>Đô</td><td>Xi</td></tr>
      <tr><td>D</td><td>Rê</td><td>Đi</td></tr>
      <tr><td>E</td><td>Mi</td><td>I</td></tr>
      <tr><td>F</td><td>Pha</td><td>Ép</td></tr>
      <tr><td>G</td><td>Sol</td><td>Gi</td></tr>
      <tr><td>A</td><td>La</td><td>Ây</td></tr>
      <tr><td>B</td><td>Si</td><td>Bi</td></tr>
    </table>

    <h2>III. Đặc điểm của 7 nốt</h2>
    <ul>
      <li>C – D: 1 cung</li>
      <li>D – E: 1 cung</li>
      <li>E – F: <strong>nửa cung</strong></li>
      <li>F – G: 1 cung</li>
      <li>G – A: 1 cung</li>
      <li>A – B: 1 cung</li>
      <li>B – C: <strong>nửa cung</strong></li>
    </ul>
    <div class="note-box">Ghi nhớ: E – F và B – C là hai cặp liền nhau, không có phím đen giữa.</div>

    <h2>IV. Vị trí trên đàn piano</h2>
    <p>Nốt C (Đô) nằm ngay trước cụm 2 phím đen. Các nốt lặp lại theo từng quãng tám: C – D – E – F – G – A – B – C</p>
  </section>

  <!-- Lesson 2 -->
  <section class="lesson-section" id="lesson2">
    <span class="back-btn" onclick="showPage('class')">← Trở về danh sách</span>
    <h1>Bài giảng 2: Âm giai cơ bản của 7 nốt nhạc</h1>
    <h2>I. Âm giai là gì?</h2>
    <p>Âm giai (scale) là tập hợp các nốt nhạc được sắp xếp theo trật tự tăng dần hoặc giảm dần về cao độ. Mỗi âm giai có công thức riêng về khoảng cách giữa các nốt.</p>

    <h2>II. Âm giai trưởng (major scale)</h2>
    <p>Công thức:</p>
    <div class="note-box">
      <strong>1 cung – 1 cung – ½ cung – 1 cung – 1 cung – 1 cung – ½ cung</strong>
    </div>
    <p>Ví dụ: Âm giai Đô trưởng (C major):</p>
    <p><strong>C – D – E – F – G – A – B – C</strong></p>

    <h2>III. Âm giai thứ tự nhiên (natural minor scale)</h2>
    <p>Âm giai thứ thường mang màu sắc buồn, sâu lắng. Công thức của âm giai thứ tự nhiên như sau:</p>
    <div class="note-box">
      <strong>1 cung – ½ cung – 1 cung – 1 cung – ½ cung – 1 cung – 1 cung</strong>
    </div>
    <p>Ví dụ: Âm giai La thứ (A minor):</p>
    <p><strong>A – B – C – D – E – F – G – A</strong></p>
    <p>La thứ là âm giai thứ tự nhiên tương ứng với Đô trưởng vì chúng dùng chung nốt (gọi là "relative minor").</p>

    <h2>IV. Các âm giai trưởng và âm giai thứ tương ứng</h2>
    <table>
      <tr>
        <th>Âm giai trưởng</th>
        <th>Âm giai thứ tương ứng</th>
        <th>Số thăng/giáng</th>
      </tr>
      <tr><td>C major</td><td>A minor</td><td>Không có</td></tr>
      <tr><td>G major</td><td>E minor</td><td>1 thăng</td></tr>
      <tr><td>D major</td><td>B minor</td><td>2 thăng</td></tr>
      <tr><td>A major</td><td>F# minor</td><td>3 thăng</td></tr>
      <tr><td>E major</td><td>C# minor</td><td>4 thăng</td></tr>
      <tr><td>B major</td><td>G# minor</td><td>5 thăng</td></tr>
      <tr><td>F major</td><td>D minor</td><td>1 giáng</td></tr>
    </table>

    <h2>V. Nhận biết âm giai thứ từ âm giai trưởng</h2>
    <p>Âm giai thứ tương ứng luôn bắt đầu từ bậc thứ 6 của âm giai trưởng. Ví dụ:</p>
    <ul>
      <li>C major: C – D – E – F – G – A – B – C</li>
      <li>Bậc 6 là A → A minor là âm giai thứ tương ứng</li>
    </ul>

    <h2>VI. Ứng dụng</h2>
    <p>Khi biết cả âm giai trưởng và thứ:</p>
    <ul>
      <li>Dễ dàng xác định hợp âm chủ đạo</li>
      <li>Chơi và hát bài hát đúng tông</li>
      <li>Phân tích cảm xúc của bài nhạc (vui – buồn)</li>
    </ul>
  </section>

  <!-- Lesson 3 -->
  <section class="lesson-section" id="lesson3">
    <span class="back-btn" onclick="showPage('class')">← Trở về danh sách</span>
    <h1>Bài giảng 3: Nhận diện nốt trên đàn guitar</h1>
    <h2>I. Ghi nhớ tên dây từ 6 đến 1</h2>
    <p>Mỗi dây đàn guitar khi không bấm (open string) sẽ có nốt riêng. Ghi nhớ tên dây như sau:</p>
    <table>
      <tr>
        <th>Dây số</th>
        <th>Nốt mở (Open Note)</th>
        <th>Ký hiệu</th>
      </tr>
      <tr><td>6</td><td>Mi trầm</td><td>E</td></tr>
      <tr><td>5</td><td>La</td><td>A</td></tr>
      <tr><td>4</td><td>Rê</td><td>D</td></tr>
      <tr><td>3</td><td>Sol</td><td>G</td></tr>
      <tr><td>2</td><td>Si</td><td>B</td></tr>
      <tr><td>1</td><td>Mi cao</td><td>E</td></tr>
    </table>
    <div class="note-box">
      Mẹo nhớ: <strong>Every Adult Dog Growls Barks Eats</strong> → E A D G B E (từ dây 6 đến 1).
    </div>

    <h2>II. Công thức nốt trên cần đàn</h2>
    <p>Khi bấm lên từng ngăn, nốt sẽ tăng theo thứ tự:</p>
    <p><strong>C – C# – D – D# – E – F – F# – G – G# – A – A# – B – C</strong> (quy luật 12 nốt lặp lại)</p>
    <p>Ví dụ với dây số 5 (A):</p>
    <ul>
      <li>Ngăn 0: A</li>
      <li>Ngăn 1: A#</li>
      <li>Ngăn 2: B</li>
      <li>Ngăn 3: C</li>
      <li>Ngăn 4: C#</li>
      <li>Ngăn 5: D</li>
      <li>… tiếp tục cho tới ngăn 12 = A (lặp lại)</li>
    </ul>

    <h2>III. Thực hành tìm nốt trên dây 6 và dây 5</h2>
    <p>Hai dây này rất quan trọng vì thường là gốc của hợp âm.</p>
    <table>
      <tr>
        <th>Ngăn</th>
        <th>Dây 6 (E)</th>
        <th>Dây 5 (A)</th>
      </tr>
      <tr><td>0</td><td>E</td><td>A</td></tr>
      <tr><td>1</td><td>F</td><td>A#</td></tr>
      <tr><td>2</td><td>F#</td><td>B</td></tr>
      <tr><td>3</td><td>G</td><td>C</td></tr>
      <tr><td>4</td><td>G#</td><td>C#</td></tr>
      <tr><td>5</td><td>A</td><td>D</td></tr>
      <tr><td>6</td><td>A#</td><td>D#</td></tr>
      <tr><td>7</td><td>B</td><td>E</td></tr>
      <tr><td>8</td><td>C</td><td>F</td></tr>
      <tr><td>9</td><td>C#</td><td>F#</td></tr>
      <tr><td>10</td><td>D</td><td>G</td></tr>
      <tr><td>11</td><td>D#</td><td>G#</td></tr>
      <tr><td>12</td><td>E</td><td>A</td></tr>
    </table>

    <h2>IV. Thực hành với các bài tập</h2>
    <ul>
      <li>Tìm vị trí nốt G trên dây 6 (→ ngăn 3)</li>
      <li>Tìm vị trí nốt C trên dây 5 (→ ngăn 3)</li>
      <li>Tìm nốt A trên dây 4 (→ ngăn 7)</li>
    </ul>

    <h2>V. Mẹo học</h2>
    <ul>
      <li>Ghi nhớ các nốt ở ngăn 3, 5, 7, 9, 12 vì dễ định vị trên cần đàn</li>
      <li>Ghi chú lên nhãn dán nhỏ dán trên cần đàn nếu cần</li>
      <li>Chơi scale và nói to nốt để ghi nhớ</li>
    </ul>
    <div class="note-box">
      Học nhận diện nốt sẽ giúp cho chơi hợp âm barre, solo, và viết nhạc chính xác hơn rất nhiều đó!
    </div>
  </section>

  <!-- Lesson 4 -->
  <section class="lesson-section" id="lesson4">
    <span class="back-btn" onclick="showPage('class')">← Trở về danh sách</span>
    <h1>Bài giảng 4: Các Thế Bấm Hợp Âm</h1>
    <h2>I. Hợp âm là gì?</h2>
    <p>Hợp âm là tập hợp từ 3 nốt trở lên được vang lên cùng lúc. Chúng là nền tảng trong đệm hát và sáng tác nhạc.</p>
    <ul>
      <li><strong>Hợp âm trưởng (Major)</strong>: Âm thanh vui, sáng. Ví dụ: C, G, F</li>
      <li><strong>Hợp âm thứ (Minor)</strong>: Âm thanh buồn, nhẹ nhàng. Ví dụ: Am, Dm, Em</li>
    </ul>

    <h2>II. Cấu tạo hợp âm</h2>
    <p>Một hợp âm thường có 3 nốt:</p>
    <ul>
      <li><strong>Nốt gốc (Root)</strong>: Là tên hợp âm</li>
      <li><strong>Nốt bậc 3</strong>: Quyết định hợp âm trưởng hay thứ</li>
      <li><strong>Nốt bậc 5</strong>: Tạo độ vững</li>
    </ul>
    <p>Ví dụ:</p>
    <ul>
      <li>C = C - E - G (Đô trưởng)</li>
      <li>Am = A - C - E (La thứ)</li>
    </ul>

    <h2>III. Các thế bấm hợp âm cơ bản trên guitar</h2>
    <h3>1. C (Đô trưởng)</h3>
    <pre>
E|---0---
B|---1---
G|---0---
D|---2---
A|---3---
E|---X---
    </pre>
    <h3>2. G (Sol trưởng)</h3>
    <pre>
E|---3---
B|---3---
G|---0---
D|---0---
A|---2---
E|---3---
    </pre>
    <h3>3. Am (La thứ)</h3>
    <pre>
E|---0---
B|---1---
G|---2---
D|---2---
A|---0---
E|---X---
    </pre>
    <h3>4. D (Rê trưởng)</h3>
    <pre>
E|---2---
B|---3---
G|---2---
D|---0---
A|---X---
E|---X---
    </pre>
    <h3>5. Em (Mi thứ)</h3>
    <pre>
E|---0---
B|---0---
G|---0---
D|---2---
A|---2---
E|---0---
    </pre>
    <h3>6. F (Pha trưởng - thế dễ)</h3>
    <pre>
E|---1---
B|---1---
G|---2---
D|---3---
A|---X---
E|---X---
    </pre>

    <h2>IV. Các hợp âm cơ bản trên piano</h2>
    <table>
      <tr>
        <th>Hợp âm</th>
        <th>Nốt đánh</th>
      </tr>
      <tr><td>C</td><td>C - E - G</td></tr>
      <tr><td>Am</td><td>A - C - E</td></tr>
      <tr><td>G</td><td>G - B - D</td></tr>
      <tr><td>F</td><td>F - A - C</td></tr>
      <tr><td>Dm</td><td>D - F - A</td></tr>
      <tr><td>Em</td><td>E - G - B</td></tr>
    </table>

    <h2>V. Luyện tập đề xuất</h2>
    <ul>
      <li>Vòng hợp âm phổ biến: C – G – Am – F</li>
      <li>Hoặc Am – F – C – G</li>
      <li>Tập chuyển hợp âm chậm, đều tay, đúng nhịp</li>
    </ul>

    <h2>VI. Mẹo ghi nhớ</h2>
    <ul>
      <li>Hợp âm <strong>Major</strong> = tươi vui</li>
      <li>Hợp âm <strong>Minor</strong> = trầm buồn</li>
      <li>Hợp âm trưởng thường kết bài để tạo cảm giác "kết thúc"</li>
      <li>Hợp âm thứ dùng để mở đầu hoặc tạo chiều sâu</li>
    </ul>
  </section>

  <!-- Lesson 5 -->
  <section class="lesson-section" id="lesson5">
    <span class="back-btn" onclick="showPage('class')">← Trở về danh sách</span>
    <h1>Bài giảng 5: Các Màu Hợp Âm</h1>
    <p>“Màu hợp âm” chính là cách bạn thêm cảm xúc cho một hợp âm cơ bản. Đây là yếu tố tạo nên phong cách và sự đặc trưng trong giai điệu.</p>

    <h2>1. Thêm nốt để tạo màu</h2>
    <p>Thay vì chơi <span class="chord">C</span> đơn thuần (C - E - G), bạn có thể thêm:</p>
    <ul>
      <li><span class="chord">Cmaj7</span>: C - E - G - B (màu buồn, bay bổng)</li>
      <li><span class="chord">Cadd9</span>: C - E - G - D (màu trong trẻo, ngọt ngào)</li>
      <li><span class="chord">C7</span>: C - E - G - Bb (màu blues, funky)</li>
    </ul>

    <h2>2. Đổi bass để tạo màu</h2>
    <p>Ví dụ:</p>
    <ul>
      <li><span class="chord">Am/G</span>: chơi hợp âm Am nhưng bass là G → màu trầm lắng, ám ảnh</li>
      <li><span class="chord">C/E</span>: chơi hợp âm C nhưng bass là E → chuyển mượt mà, sáng</li>
    </ul>

    <h2>3. Dùng hợp âm thay thế</h2>
    <p>Ví dụ: thay vì <span class="chord">Am</span>, dùng <span class="chord">Fmaj7</span> hoặc <span class="chord">C6</span> để giữ cùng âm sắc nhưng có màu mới lạ hơn.</p>

    <div class="note-box">
      <strong>Mẹo:</strong> Hãy lắng nghe cảm xúc mà từng hợp âm tạo ra, rồi thử sáng tạo bằng cách chèn thêm nốt 7, 9, 11, 13 hoặc dùng hợp âm slash.
    </div>

    <h2>4. Ứng dụng</h2>
    <p>Trong một vòng hợp âm như <span class="chord">C - Am - F - G</span>, thử biến thành:</p>
    <p><span class="chord">Cmaj7 - Am7 - Fadd9 - G13</span> để tạo cảm giác mượt mà, bay bổng hơn.</p>
  </section>

  <!-- Lesson 6 -->
  <section class="lesson-section" id="lesson6">
    <span class="back-btn" onclick="showPage('class')">← Trở về danh sách</span>
    <h1>Bài giảng 6: Màu 7 Trong Hợp Âm</h1>
    <p>Hợp âm có "nốt 7" thường dùng để tạo thêm màu sắc hoặc độ "tình" cho bài nhạc. Có 5 dạng chính:</p>

    <h2>1. Trưởng 7 (Major 7)</h2>
    <p><strong>Cấu trúc:</strong> 1 – 3 – 5 – <span class="note">7</span></p>
    <ul>
      <li><span class="chord">Cmaj7</span> = C – E – G – <span class="note">B</span></li>
      <li><span class="chord">Fmaj7</span> = F – A – C – <span class="note">E</span></li>
    </ul>
    <div class="note-box">
      <strong>Màu sắc:</strong> Sang trọng, bay bổng, hơi mộng mơ – thường dùng trong ballad, jazz, RnB, bossa.
    </div>

    <h2>2. Thứ 7 (Minor 7)</h2>
    <p><strong>Cấu trúc:</strong> 1 – <span class="note">b3</span> – 5 – <span class="note">b7</span></p>
    <ul>
      <li><span class="chord">Am7</span> = A – C – E – <span class="note">G</span></li>
      <li><span class="chord">Dm7</span> = D – F – A – <span class="note">C</span></li>
    </ul>
    <div class="note-box">
      <strong>Màu sắc:</strong> Buồn nhưng nhẹ, có chiều sâu – rất phù hợp với nhạc tâm trạng hoặc jazz lofi.
    </div>

    <h2>3. Át 7 (Dominant 7)</h2>
    <p><strong>Cấu trúc:</strong> 1 – 3 – 5 – <span class="note">b7</span></p>
    <ul>
      <li><span class="chord">G7</span> = G – B – D – <span class="note">F</span></li>
      <li><span class="chord">C7</span> = C – E – G – <span class="note">Bb</span></li>
    </ul>
    <div class="note-box">
      <strong>Màu sắc:</strong> Căng thẳng nhẹ, có xu hướng chuyển động – thường dùng để tạo lực đẩy về hợp âm chủ (ứng dụng trong vòng 5-1).
    </div>

    <h2>4. Tăng 7 (Augmented 7)</h2>
    <p><strong>Cấu trúc:</strong> 1 – 3 – <span class="note">#5</span> – <span class="note">b7</span></p>
    <ul>
      <li><span class="chord">C+7</span> = C – E – <span class="note">G#</span> – <span class="note">Bb</span></li>
      <li><span class="chord">G+7</span> = G – B – <span class="note">D#</span> – <span class="note">F</span></li>
    </ul>
    <div class="note-box">
      <strong>Màu sắc:</strong> Gắt, bất định, nghe hơi bí ẩn hoặc căng – rất hay dùng trong jazz hoặc modulations (chuyển tông).
    </div>

    <h2>5. Giảm 5 có 7 (7b5 hoặc Half-Diminished 7)</h2>
    <p><strong>Cấu trúc:</strong> 1 – <span class="note">b3</span> – <span class="note">b5</span> – <span class="note">b7</span></p>
    <ul>
      <li><span class="chord">Bm7b5</span> = B – D – <span class="note">F</span> – <span class="note">A</span></li>
      <li><span class="chord">Em7b5</span> = E – G – <span class="note">Bb</span> – <span class="note">D</span></li>
    </ul>
    <div class="note-box">
      <strong>Màu sắc:</strong> Ma mị, lạnh lẽo, rất hợp với cảm xúc cô đơn, rơi vào khoảng không – thường dùng ở bậc VII trong âm giai thứ.
    </div>

    <h2>Tổng kết màu sắc</h2>
    <ul>
      <li><span class="chord">Maj7</span> – Sáng, mơ mộng</li>
      <li><span class="chord">m7</span> – Nhẹ, sâu lắng</li>
      <li><span class="chord">7 (dominant)</span> – Căng, đẩy</li>
      <li><span class="chord">+7</span> – Gắt, lạ</li>
      <li><span class="chord">m7b5</span> – U tối, lạnh</li>
    </ul>
    <div class="note-box">
      <strong>Lời khuyên:</strong> Thử chơi các vòng hợp âm cơ bản rồi thêm từng màu 7 vào – cảm nhận sự thay đổi và ghi nhớ cảm xúc mà nó tạo ra.
    </div>
  </section>
  <!-- Lesson 7 -->
  <section class="lesson-section" id="lesson7">
    <span class="back-btn" onclick="showPage('class')">← Trở về danh sách</span>
    <h1>Bài giảng 7: Guitar Cơ bản - Hợp Âm</h1>
    <p>Trong bài này, bạn sẽ luyện tập chuyển hợp âm cơ bản, rải dây và đệm hát với một số bài hát đơn giản.</p>
    <h2>Hợp âm cơ bản cần ôn lại</h2>
    <ul>
      <li>Hợp âm Trưởng: C, G, D, A, E</li>
      <li>Hợp âm Thứ: Am, Dm, Em</li>
      <li>Hợp âm 7: G7, C7</li>
    </ul>
    <h2>Bài tập 1: Chuyển hợp âm mượt</h2>
    <p>Luyện chuyển các cặp hợp âm:</p>
    <ul>
      <li>C - G - Am - F</li>
      <li>Em - D - C - G</li>
      <li>Am - Dm - E - Am</li>
    </ul>
    <h2>Bài tập 2: Rải dây theo nhịp 3/4 và 4/4</h2>
    <p>Áp dụng rải dây: p-i-m-a-m-i</p>
    <h2>Bài tập 3: Đệm hát các bài cơ bản</h2>
    <ul>
      <li><strong>Happy Birthday</strong> (C - G - G7 - C)</li>
      <li><strong>Quê hương tôi</strong> (Am - Dm - E - Am)</li>
      <li><strong>Let it be</strong> (C - G - Am - F)</li>
      <li><strong>Như có Bác Hồ trong ngày vui đại thắng</strong> (D - G - A7 - D)</li>
      <li><strong>Diễm xưa</strong> (Am - D7 - G - C - F - Bdim - E7)</li>
    </ul>
    <h2>Bài tập 4: Tự viết hợp âm cho đoạn lời</h2>
    <p>Chọn một đoạn lời bài hát yêu thích và thử gán hợp âm cho từng câu.</p>
    <h2>Gợi ý luyện tập</h2>
    <ul>
      <li>Luyện ít nhất 15 phút/ngày chuyển hợp âm</li>
      <li>Ghi âm lại để nghe và tự chỉnh lỗi</li>
      <li>Có thể chơi chậm nhưng phải đúng nhịp</li>
    </ul>
  </section>
<section class="terms-section" id="terms" style="display: none;">
  <h1>Điều khoản Sử dụng</h1>
  <p>Chào mừng bạn đến với website của Yến Nhi. Khi sử dụng website này, bạn đồng ý với các điều khoản sau:</p>
  <h2>1. Mục đích sử dụng</h2>
  <p>Website được tạo ra nhằm mục đích chia sẻ kiến thức, tài liệu học tập và các khóa học trực tuyến. Mọi hành vi sử dụng sai mục đích như sao chép, phát tán nội dung trái phép sẽ bị nghiêm cấm.</p>
  <h2>2. Quyền sở hữu nội dung</h2>
  <p>Tất cả hình ảnh, video, nội dung trên website này thuộc quyền sở hữu của Yến Nhi, trừ khi được ghi rõ nguồn khác. Vui lòng không sao chép hoặc sử dụng lại khi chưa có sự đồng ý.</p>
  <h2>3. Quyền và trách nhiệm của người dùng</h2>
  <ul>
    <li>Không bình luận thô tục, xúc phạm hay vi phạm pháp luật.</li>
    <li>Không phá hoại, tấn công, spam hệ thống website.</li>
    <li>Không chia sẻ tài khoản học cho người khác nếu có đăng ký học.</li>
  </ul>
  <h2>4. Bảo mật thông tin</h2>
  <p>Thông tin bạn cung cấp sẽ được bảo mật tuyệt đối và không chia sẻ cho bên thứ ba, trừ khi có yêu cầu từ cơ quan pháp luật.</p>
  <h2>5. Thay đổi điều khoản</h2>
  <p>Chúng tôi có thể cập nhật điều khoản bất kỳ lúc nào mà không cần báo trước. Vui lòng kiểm tra định kỳ để đảm bảo bạn đã nắm rõ nội dung mới.</p>
  <p class="thanks">Cảm ơn bạn đã tin tưởng và đồng hành cùng Yến Nhi!</p>
  <a href="#" class="back-home" onclick="showPage('home')">← Về trang chủ</a>
</section>
<section class="policy-section" id="policy" style="display: none;">
  <h1>Chính sách Bảo mật & Quyền riêng tư</h1>
  <p>Trang web của Yến Nhi cam kết bảo vệ thông tin cá nhân và quyền riêng tư của người dùng. Khi truy cập và sử dụng dịch vụ, bạn đồng ý với các chính sách sau:</p>
  <h2>1. Thu thập thông tin</h2>
  <p>Chúng tôi có thể thu thập các thông tin như tên, email, và các dữ liệu liên quan đến quá trình học tập nhằm mục đích hỗ trợ và cải thiện trải nghiệm người dùng.</p>
  <h2>2. Sử dụng thông tin</h2>
  <p>Thông tin thu thập được chỉ sử dụng để:</p>
  <ul>
    <li>Liên hệ và hỗ trợ học viên.</li>
    <li>Phân tích và nâng cao chất lượng nội dung học.</li>
    <li>Gửi thông báo về khóa học hoặc thông tin quan trọng.</li>
  </ul>
  <h2>3. Bảo mật dữ liệu</h2>
  <p>Mọi dữ liệu cá nhân được lưu trữ một cách an toàn và không chia sẻ với bên thứ ba nếu không có sự đồng ý của bạn, trừ khi có yêu cầu từ cơ quan pháp luật.</p>
  <h2>4. Quyền của người dùng</h2>
  <ul>
    <li>Yêu cầu chỉnh sửa hoặc xóa thông tin cá nhân.</li>
    <li>Từ chối nhận thông báo qua email bất kỳ lúc nào.</li>
    <li>Liên hệ trực tiếp nếu phát hiện vi phạm về dữ liệu.</li>
  </ul>
  <h2>5. Cập nhật chính sách</h2>
  <p>Chính sách này có thể được cập nhật bất kỳ lúc nào. Mọi thay đổi sẽ được thông báo trực tiếp trên trang web.</p>
  <p class="thanks">Cảm ơn bạn đã tin tưởng và sử dụng dịch vụ tại Yến Nhi!</p>
  <a href="#" class="back-home" onclick="showPage('home')">← Về trang chủ</a>
</section>
<section id="recruit" class="recruit-section" style="display: none;">
  <h1>🎯 Tuyển Dụng Thành Viên</h1>
  <p class="intro-text">
    Bạn yêu thích âm nhạc và muốn tham gia vào một cộng đồng trẻ, năng động, sáng tạo?  
    Hãy gia nhập đội ngũ của <strong>VYN.EDU</strong> để cùng nhau lan tỏa đam mê âm nhạc!
  </p>

  <div class="recruit-cards">
    <div class="recruit-card">
      <h2>🎸 Giáo viên Guitar</h2>
      <ul>
        <li>Biết đệm hát, solo căn bản hoặc nâng cao.</li>
        <li>Giao tiếp tốt, truyền cảm hứng cho học viên.</li>
        <li>Ưu tiên từng biểu diễn, có kinh nghiệm sư phạm.</li>
      </ul>
    </div>

    <div class="recruit-card">
      <h2>🎹 Giáo viên Piano</h2>
      <ul>
        <li>Thành thạo piano cổ điển hoặc hiện đại.</li>
        <li>Có kiến thức nhạc lý cơ bản.</li>
        <li>Thái độ thân thiện, kiên nhẫn với học viên nhỏ tuổi.</li>
      </ul>
    </div>

    <div class="recruit-card">
      <h2>🧑‍💻 Quản lý website</h2>
      <ul>
        <li>Biết HTML, CSS, JavaScript (biết PHP là lợi thế).</li>
        <li>Quản trị nội dung, xử lý lỗi, bảo mật website.</li>
        <li>Cập nhật bài viết, sự kiện âm nhạc định kỳ.</li>
      </ul>
    </div>
  </div>

  <div class="apply-section">
    <h2>📩 Cách ứng tuyển</h2>
    <p>Gửi email về: <strong></strong>
        <a href="mailto:yennhicutexinhgai@gmail.com">yennhicutexinhgai@gmail.com</a>  
      kèm theo CV và các bản thu (nếu có).  
      Chúng tôi sẽ phản hồi bạn trong vòng 3 ngày làm việc.</p>
  </div>

  <a href="#" class="back-home" onclick="showPage('home')">← Về trang chủ</a>
</section>
<section class="cookie-section" id="cookie" style="display: none;">
  <h1>Chính sách Cookie</h1>
  <p>Website của Yến Nhi sử dụng cookie để cải thiện trải nghiệm người dùng. Khi tiếp tục sử dụng trang web, bạn đồng ý với việc sử dụng cookie theo chính sách này.</p>
  <h2>1. Cookie là gì?</h2>
  <p>Cookie là các tệp nhỏ được lưu trữ trên trình duyệt của bạn khi truy cập website. Chúng giúp ghi nhớ các tùy chọn của bạn như ngôn ngữ, thông tin đăng nhập, hoặc các hành động trước đó.</p>
  <h2>2. Chúng tôi sử dụng cookie để:</h2>
  <ul>
    <li>Ghi nhớ tùy chọn người dùng.</li>
    <li>Hiểu cách bạn sử dụng website để cải thiện nội dung.</li>
    <li>Lưu trạng thái đăng nhập (nếu có).</li>
    <li>Phân tích lưu lượng truy cập trang để tối ưu hiệu suất.</li>
  </ul>
  <h2>3. Bên thứ ba</h2>
  <p>Website có thể sử dụng dịch vụ bên thứ ba như Google Analytics, và các dịch vụ này cũng có thể dùng cookie riêng để thu thập dữ liệu ẩn danh.</p>
  <h2>4. Cách kiểm soát cookie</h2>
  <p>Bạn có thể thay đổi thiết lập cookie trong trình duyệt bất kỳ lúc nào. Việc chặn cookie có thể ảnh hưởng đến trải nghiệm sử dụng của bạn trên website.</p>
  <h2>5. Thay đổi chính sách cookie</h2>
  <p>Chính sách này có thể thay đổi theo thời gian. Mọi cập nhật sẽ được thông báo rõ ràng trên website.</p>
  <p class="thanks">Cảm ơn bạn đã tin tưởng và sử dụng dịch vụ của Yến Nhi!</p>
  <a href="#" class="back-home" onclick="showPage('home')">← Về trang chủ</a>
</section> 
</section>

 <footer class="footer">
  <div class="footer-top">
    <a href="#" onclick="showPage('home', this)" class="footer-logo">Yến Nhi</a>
    <div class="footer-links">
    <a href="#" onclick="showPage('class', this)">dành cho học viên</a>
      <a href="#" onclick="showPage('recruit', this)">Tuyển dụng</a>
      <a href="comment.php">bình luận góp ý</a>
      <a href="chat.php">cộng đồng</a>
      <a href="#">Blog</a>
      <a href="https://www.facebook.com/share/1AQcChEJ8F/" target="_blank">Liên hệ</a>
      <a href="mailto:yennhicutexinhgai@gmail.com">Hỗ trợ</a>
    </div>
    <div class="footer-socials">
      <a href="https://www.facebook.com/share/1AQcChEJ8F/" target="_blank"><i class="fab fa-facebook-f"></i></a>
      <a href="http://www.instagram.com/furinadefontaine.13.10" target="_blank"><i class="fab fa-instagram"></i></a>
      <a href="https://www.youtube.com/channel/UCiVrdRuewEeETIMgcHmnP6Q/about" target="_blank"><i class="fab fa-youtube"></i></a>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="footer-legal">
      © 2025 Yến Nhi. All rights reserved.
      <span>·</span>
     <a href="#" onclick="showPage('terms')">Điều khoản</a>
     <a href="#" onclick="showPage('policy')">Chính sách</a>
    <a href="#" onclick="showPage('cookie')">Cookie</a>
    </div>
  </div>
</footer>
<script src="script.js"></script>
</body>
</html>