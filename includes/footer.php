<!-- Footer section -->
<hr>
<footer class="">
    <div class="left">
        <h4>&copy;2023, Centre for Career Development</h4>
    </div>
    <div class="right">
        <h4>Developed & maintained By <a href="https://github.com/MiniProjectTeam12/EPlacement">Team-12</a> </h4>
    </div>
        <h5>Barak Valley Engineering College</h5>
</footer>



<!-- Javascript section -->
<script src="https://kit.fontawesome.com/c5009e06c9.js" crossorigin="anonymous"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var popup = document.getElementById('popup-message');
        popup.style.display = 'block';
        popup.style.animation = 'slideIn 0.5s forwards';

        setTimeout(function() {
            popup.style.animation = 'slideOut 0.5s forwards';
            setTimeout(function() {
                popup.style.display = 'none';
            }, 500); // Animation duration (0.5 seconds)
        }, 1500); // 15 seconds
    });
</script>
<style>
    @keyframes slideIn {
        0% {
            transform: translateX(100%);
        }

        100% {
            transform: translateX(0);
        }
    }

    @keyframes slideOut {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(100%);
        }
    }
</style>
<script src="js/script.js"></script> 