// Định nghĩa hàm toggleMenu toàn cục
function toggleMenu() {
  const sideMenu = document.getElementById('sideMenu');
  if (sideMenu) sideMenu.classList.toggle('active');
}

// Định nghĩa hàm showPage toàn cục
function showPage(pageId, element = null) {
  const sections = document.querySelectorAll('section');
  const targetPage = document.getElementById(pageId);

  if (!targetPage) return;

  sections.forEach(section => section.style.display = 'none');
  targetPage.style.display = 'block';
  window.scrollTo({ top: 0, behavior: 'smooth' });

  const titleEl = document.getElementById('headerTitle');
  if (titleEl) {
    const pageTitles = {
      home: 'Trang chủ',
      class: 'Lớp học nhạc lý',
      about: 'Giới thiệu',
      contact: 'Liên hệ',
      origin: 'Âm nhạc bắt đầu từ đâu?',
      difficulty: 'Học âm nhạc khó không?',
      terms: 'Điều khoản sử dụng',
      policy: 'Chính sách',
      cookie: 'Cookie',
      violin: 'Khám phá Violin',
      guitar: 'Khám phá Guitar',
      piano: 'Khám phá Piano'
    };
    titleEl.innerText = pageTitles[pageId] || 'Yến Nhi';
  }

  document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active'));
  if (element) element.classList.add('active');

  const sideMenu = document.getElementById('sideMenu');
  if (sideMenu) sideMenu.classList.remove('active');
}

document.addEventListener('DOMContentLoaded', function() {
  // Xử lý toggle nhạc (audio)
  const audio = document.getElementById('bg-music');
  const btn = document.getElementById('toggle-music');
  if (audio && btn) {
    btn.addEventListener('click', () => {
      if (audio.paused) {
        audio.play();
        btn.textContent = '🔊 Tắt nhạc';
      } else {
        audio.pause();
        btn.textContent = '🔈 Bật nhạc';
      }
    });
  }

  // Xử lý nav login/logout
  const nav = document.getElementById('main-nav');
  const isLoggedIn = localStorage.getItem('isLoggedIn');
  if (nav) {
    if (isLoggedIn) {
      const logoutLink = document.createElement('a');
      logoutLink.href = 'logout.html'; // Hoặc logout.php
      logoutLink.className = 'nav-link';
      logoutLink.innerText = 'Đăng xuất';
      nav.appendChild(logoutLink);
    } else {
      const loginLink = document.createElement('a');
      loginLink.href = 'login.html'; // Hoặc login.php
      loginLink.className = 'nav-link';
      loginLink.innerText = 'Đăng nhập';
      nav.appendChild(loginLink);
    }
  }

  // Xử lý form comment với fetch (AJAX)
  const form = document.getElementById('commentForm');
  if (form) {
    form.addEventListener('submit', function(event) {
      event.preventDefault();

      const formData = new FormData(form);

      fetch('comment_process.php', {
        method: 'POST',
        body: formData
      })
      .then(res => {
        if (!res.ok) throw new Error('Network response was not ok');
        return res.json();
      })
      .then(data => {
        alert(data.message);
        if (data.success) {
          form.reset();

          // Tự động load lại comment mới mà không cần reload trang
          fetch('comment_display.php')
            .then(res => {
              if (!res.ok) throw new Error('Network response was not ok');
              return res.text();
            })
            .then(html => {
              const container = document.getElementById('commentsContainer');
              if (container) container.innerHTML = html;
            })
            .catch(err => console.error('Error loading comments:', err));
        }
      })
      .catch(error => {
        console.error('Fetch error:', error);
        alert('Lỗi kết nối, vui lòng thử lại');
      });
    });
  }
});

// 🚫 Chặn phím tắt nguy hiểm + out web
document.addEventListener("keydown", function (e) {
  const forbidden = [
    { ctrl: true, shift: true, key: 'I' },
    { ctrl: true, shift: true, key: 'J' },
    { ctrl: true, shift: true, key: 'C' },
    { ctrl: true, key: 'U' },
    { ctrl: true, key: 'S' },
    { ctrl: true, key: 'P' },
    { ctrl: true, shift: true, key: 'S' },
    { key: 'F12' }
  ];

  const match = forbidden.some(combo =>
    (!combo.ctrl || e.ctrlKey) &&
    (!combo.shift || e.shiftKey) &&
    e.key.toUpperCase() === combo.key
  );

  if (match) {
    e.preventDefault();
    window.location.href = "https://google.com"; // 🌐 Out hẳn
    return false;
  }
});

// 🚫 Chặn chuột phải
document.addEventListener("contextmenu", function (e) {
  e.preventDefault();
  window.location.href = "https://google.com"; // 🌐 Out hẳn khi click phải
});

// 🚫 Phát hiện mở DevTools
setInterval(() => {
  if (window.outerHeight - window.innerHeight > 120 || window.outerWidth - window.innerWidth > 200) {
    window.location.href = "https://google.com";
  }
}, 500);

// 🚫 Chặn view-source: trên link
if (location.href.startsWith("view-source:")) {
  window.location.href = "https://google.com";
}

// CSS animation phải có trong file CSS hoặc style tag
// Ví dụ CSS cho .music-note và animation fall:
/*
.music-note {
  pointer-events: none;
  z-index: 9999;
}

@keyframes fall {
  0% {
    top: 0;
    opacity: 1;
  }
  100% {
    top: 100vh;
    opacity: 0;
  }
}
*/
// Nhạc note bay (hiệu ứng nhẹ nhàng)
let noteCount = 0;
const maxNotes = 1000;
setInterval(() => {
  if (noteCount < maxNotes) {
    const note = document.createElement('div');
    note.className = 'music-note';
    note.innerText = '♪';
    note.style.left = Math.random() * 100 + 'vw';
    note.style.animationDuration = (3 + Math.random() * 3) + 's';
    document.body.appendChild(note);
    noteCount++;
    setTimeout(() => {
      note.remove();
      noteCount--;
    }, 5000);
  }
}, 600);

document.addEventListener("DOMContentLoaded", function () {
            const commentForm = document.getElementById("commentForm");
            const commentList = document.getElementById("commentList");

            function loadComments() {
                fetch("comment_display.php?page_id=piano")
                    .then(res => res.text())
                    .then(data => {
                        commentList.innerHTML = data;
                    });
            }

            commentForm.addEventListener("submit", function (e) {
                e.preventDefault();
                const formData = new FormData(commentForm);

                fetch("comment_process.php", {
                    method: "POST",
                    body: formData
                })
                .then(res => res.text())
                .then(() => {
                    commentForm.reset();
                    loadComments();
                });
            });

            loadComments(); // Tải comment khi mở trang
        });