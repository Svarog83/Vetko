erase 1.jpg
erase 1.jpg_original
copy C:\WebServers\home\ukinsp2.ru\www\OMSMain\inv\list\_uk\1.jpg C:\Programs\exiftool-8.15\1.jpg
exiftool -tagsfromfile @ -iptc:all -codedcharacterset=utf8 -charset iptc=cp1251 ./
exiftool "-iptc:caption-abstract>exif:imagedescription" ./



