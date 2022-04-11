function hitung() {  
                    var harga= parseFloat(document.hitungdiskon.harga.value);  
                      if (isNaN(harga)) {harga=0.0;}  
                    var diskon=parseFloat(document.hitungdiskon.diskon.value);  
                      if (isNaN(diskon)) {diskon=0.0;}  var hargadiskon= harga * diskon / 100;  
                    var hasil = harga - hargadiskon;  
                    document.hitungdiskon.hasildiskon.value= hasil;  
                    document.hitungdiskon.hrgdiskon.value= hargadiskon;     
                  }