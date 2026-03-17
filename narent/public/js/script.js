const btnTheme = document.getElementById('btn-theme');
const themeIcon = document.getElementById('theme-icon');
const body = document.body;

function updateIcon(isDark) {
    if (isDark) {
        themeIcon.classList.replace('bi-moon-stars', 'bi-sun-fill');
    } else {
        themeIcon.classList.replace('bi-sun-fill', 'bi-moon-stars');
    }
}

if (localStorage.getItem('theme') === 'dark') {
    body.classList.add('dark-mode');
    updateIcon(true);
}

btnTheme.addEventListener('click', function() {
    body.classList.toggle('dark-mode');

    const isDarkMode = body.classList.contains('dark-mode');
    
    if (isDarkMode) {
        localStorage.setItem('theme', 'dark');
        updateIcon(true);
    } else {
        localStorage.setItem('theme', 'light');
        updateIcon(false);
    }
}); 

let dataWishlist = [];

function aktifkanTombolSewaWishlist(){
    const tombolSewa = document.querySelectorAll('.btn-sewa');
    tombolSewa.forEach(function(button){
        button.addEventListener('click', function(e){
            const cardBody = e.target.closest('.card-body');
            const stokElement = cardBody.querySelector('.stok-text');
            let stok = parseInt(stokElement.innerText);
            if(stok > 0) {
                stok--;
                stokElement.innerText = stok + ' Unit Ready';
                const namaArmada = cardBody.querySelector('.card-title').innerText;
                alert('Berhasil menyewa ' + namaArmada + '!');
                if(stok === 0) {
                    e.target.disabled = true;
                    e.target.innerText = "Habis";
                }
            } else {
                alert('Stok Habis!');
            } 
        });
    });
    const tombolWishlist = document.querySelectorAll('.btn-wishlist');
    tombolWishlist.forEach(function(button) {
        button.addEventListener('click', function(e){
            const card = e.target.closest('.card');        
            const namaArmada = card.querySelector('.card-title').innerText;
            const hargaArmada = card.querySelector('.card-text').innerText;
            const gambarArmada = card.querySelector('.card-img-top').src;
            const indexArmadaDitemukan = dataWishlist.findIndex(item => item.nama === namaArmada);
            if (indexArmadaDitemukan !== -1) {
                dataWishlist[indexArmadaDitemukan].jumlah++;
            } else {
                dataWishlist.push({
                    gambar: gambarArmada,
                    nama: namaArmada,
                    harga: hargaArmada,
                    jumlah: 1
                });
            }
            rubahWishlist();
            alert(namaArmada + ' ditambahkan ke Wishlist!');
        });
    });
}

function rubahWishlist() {
    const daftarWishlist = document.getElementById('daftar-wishlist');
    const wishlistCount = document.getElementById('wishlist-count');
    
    while (daftarWishlist.firstChild) {
        daftarWishlist.removeChild(daftarWishlist.firstChild);
    }

    let totalArmada = 0;

    dataWishlist.forEach((item, index) => {
        totalArmada += item.jumlah;

        const listItem = document.createElement('li');
        listItem.className = 'list-group-item d-flex justify-content-between align-items-center';

        const wrapperKiri = document.createElement('div');
        wrapperKiri.className = 'd-flex align-items-center';

        const img = document.createElement('img');
        img.src = item.gambar;
        img.alt = item.nama;
        img.style.width = '50px';
        img.style.height = '50px';
        img.style.objectFit = 'cover';
        img.style.borderRadius = '5px';
        img.style.marginRight = '15px';

        const textContainer = document.createElement('div');
        const nameHeader = document.createElement('h6');
        nameHeader.className = 'mb-0 fw-bold';
        nameHeader.innerText = item.nama;

        const priceSmall = document.createElement('small');
        priceSmall.className = 'text-muted';
        priceSmall.innerText = item.harga;

        textContainer.appendChild(nameHeader);
        textContainer.appendChild(priceSmall);
        wrapperKiri.appendChild(img);
        wrapperKiri.appendChild(textContainer);

        const wrapperKanan = document.createElement('div');
        wrapperKanan.className = 'd-flex align-items-center gap-2';

        const badge = document.createElement('span');
        badge.className = 'badge bg-primary rounded-pill';
        badge.innerText = item.jumlah;

        const btnHapusItem = document.createElement('button');
        btnHapusItem.className = 'btn btn-outline-danger btn-sm border-0';
        
        const iconHapus = document.createElement('i');
        iconHapus.className = 'bi bi-trash3';
        
        btnHapusItem.appendChild(iconHapus);

        btnHapusItem.addEventListener('click', function() {
            hapusItemSpesifik(index);
        });

        wrapperKanan.appendChild(badge);
        wrapperKanan.appendChild(btnHapusItem);

        listItem.appendChild(wrapperKiri);
        listItem.appendChild(wrapperKanan);
        daftarWishlist.appendChild(listItem);
    });
    
    wishlistCount.innerText = totalArmada;
}

function tampilkanWishlist() {
    const modalElement = document.getElementById('wishlistModal');
    const modalWishlist = bootstrap.Modal.getOrCreateInstance(modalElement);
    modalWishlist.show();
}

function hapusWishlist() {
    if (dataWishlist.length === 0) {
        alert("Wishlist sudah kosong!");
        return;
    }
    dataWishlist = [];
    rubahWishlist();
    const modalElement = document.getElementById('wishlistModal');
    const modalWishlist = bootstrap.Modal.getOrCreateInstance(modalElement);
    modalWishlist.hide();
    alert('Wishlist berhasil dikosongkan!');
}

function hapusItemSpesifik(index) {
    if (dataWishlist[index].jumlah > 1) {
        dataWishlist[index].jumlah--;
    } else {
        dataWishlist.splice(index, 1);
    }
    
    rubahWishlist();
}

aktifkanTombolSewaWishlist();