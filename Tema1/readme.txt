Budau Alexandru 342 C1

Pagina mea este despre domeniul: Fotografie, mai exact despre "Sfaturi pentru fotografii incepatori"

Continut: index.html, index_style.css

Body:
	-foloseste font Lucida Sans Unicode
	-culoare fundal: gri inchis

Header:
	-background - imagine de tip pattern (hrizontal si vertical repeat) - giraffe_seamless_pattern.png
	-meniu orizontal
		-fiecare tab din cele 4 refera o zona cheie din pagina (Login, Feedback, Contact) sau pagina parinte - Home (am folosit ancore pentru a realiza acest lucru)
	-layout - doua coloane -> tabel cu un rand si doua coloane
		-prima coloana contine
			-titlul articolului
			-imagine cu o camera (camera.jpeg)
		-a doua coloana contine
			-subtitlul articolului
			-o galerie de imagini stilizata cu ajutorul efectelor css3 (am adaugat efecte la hover si click)
			-pentru a observa efectele se plaseaza cursorul pe fiecare dinntr imagini si se apasa click

Main (ARTICOL0) este continutul principal al paginii. acesta contne:
	-o singura coloana
	-mesaj bun venit pozitionat in header
	-meniu orizontal de tip dropdown ce contine doua taburi
		-fiecare tab din meniu este dedicat unui articol de mai jos
		-fiecare element al enumeratiei dintr-un tab este o referinta catre un item din articolul aferent tabului
		-pentru a actiunea DROP a taburilor din meniu este suficienta plasarea cursorului pe tabul respectiv
		-mod de implementare:
			-am creat un tabel si pentru fiecare tab am creat o coloana
			-in css - am folosit display none/block pentru enumeratiile corespunzatoare taburilor din meniu si position absolute pentru a raporta pozitia la parinte fara a lua in seama restul elementelor plasate in continuare
	
	-ARTICOL1
		-header cu titlul videoclipului
		-tabel
			-primul rand contine un videoclip intr-un iframe in prima coloana, si un citat in a doua coloana
			-al doilea rand se intinde pe doua coloane si contine o animatie construita cu ajutorul efectelor din css3
			-mod de implementare:
				-am creat o lista de imagini care depaseste dimensiunea containerului
				-am potrivit dimensiunea unei imagini in container
				-am setat overflow pe hidden
				-am utilizat position relative
				-am folosit @keyframes unde am definit pozitia la diferite momente de timp
				-am utilizat proprietatea 'animation'
		-acest articol ofera continut multimedia si contribuie la estetica paginii
		-acest articol contine UN TABEL, UN VIDEO, IMAGINI, CITAT, TITLU
	
	-ARTICOL2
		-articolul corespunzator primului tab
		-contine o lista neordonata cu itemii referiti in enumeratia primului tab din meniul drop-down
		-acest articol are scop informativ
		-acest articol contine TITLU, DATA, CITATE, PARAGRAFE, ANCORE ce refera catre alte websiteuri

	-ARTICOL3
		-articolul corespunzator celui de-al doilea tab
		-contine o lista neordonata cu itemii referiti in enumeratia celui de-al doilea tab din meniul drop-down
		-acest articol are scop informativ
		-acest articol contine TITLU, DATA, CITATE, PARAGRAFE, ANCORE ce refera catre alte websiteuri

	-ARTICOL4
		-contine un titlu sugestiv pentru logIn
		-contine un formular de logIn
		-acest articol contine TITLU, DATA, PARAGRAF, DIV, FORMULAR LOGIN

	-ARTICOL5
		-contine un titlu sugestiv pentru feedback
		-contine un formular de feedback
		-acest articol contine TITLU, DATA, PARAGRAF, DIV, FORMULAR FEEDBACK

Footer
	-continutul este afisat pe o singura coloana
	-fundalul are culoare portocalie
	-contine un titlu sugestiv pentru contact
	-contine un formular de contact autor
	-acest articol contine TITLU, DATA, PARAGRAF, DIV, FORMULAR CONTACT, COPYRIGHT
