# autocomplétion en jquery-ui

sur un dictionnaire ordonné par fréquences inverses



# export depuis sphinx

Il est préférable que le dictionnaire emporte une notion de fréquence des mots. C’est ce que fait Sphinx quand on lui demande d’exporter.

(à noter qu’il est aussi possible d’exporter le dictionnaire d’une autre base sphinx, tant que c’est la langue et l’espace de vocabulaire souhaité).

```
INDEX=indexrt
echo "FLUSH RAMCHUNK $INDEX;" | mysql -h 127.0.0.1 -P 9306
SPIFILE=`ls data/$INDEX.*.spi | head -1`
if [ "$SPIFILE" ]; then
   indextool --dumpdict $SPIFILE > data/$INDEX.dict.txt
else
    echo "pas trouve de fichier data/$INDEX.*.spi"
fi
```

