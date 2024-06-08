document.getElementById('filterButton').onclick = function() {
    document.getElementById('popup1').style.display = 'flex';
};

document.getElementById('closePopup1').onclick = function() {
    document.getElementById('popup1').style.display = 'none';
};

document.getElementById('showColumns').onclick = function() {
    document.getElementById('popup2').style.display = 'flex';
};

document.getElementById('closePopup2').onclick = function() {
    document.getElementById('popup2').style.display = 'none';
};

document.getElementById('checkNgayNhapHoc').onclick = function() {
    document.getElementById('dateSelectorNhapHoc').style.display = this.checked ? 'block' : 'none';
};

document.getElementById('checkNgayThiTuyen').onclick = function() {
    document.getElementById('dateSelectorThiTuyen').style.display = this.checked ? 'block' : 'none';
};

document.getElementById('checkNgaySinh').onclick = function() {
    document.getElementById('dateSelectorSinh').style.display = this.checked ? 'block' : 'none';
};

document.getElementById('checkNgayXuatCanh').onclick = function() {
    document.getElementById('dateSelectorXuatCanh').style.display = this.checked ? 'block' : 'none';
};

document.querySelectorAll('.collapse-button').forEach(button => {
    button.onclick = function() {
        this.classList.toggle('active');
        const content = this.nextElementSibling;
        if (content.style.display === 'block') {
            content.style.display = 'none';
        } else {
            content.style.display = 'block';
        }
    };
});

