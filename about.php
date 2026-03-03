<?php
// User info
require_once 'assets/functions/user_select-id.php';
// Header
require_once 'assets/includes/header.php';
?>

<main>
    <!-- FAQ och kontaktformulär -->
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Hur kan vi hjälpa dig?</h1>
        <div class="row justify-content-center">
            <div class="col-sm-3 p-4 FAQ rounded-3">
                <h2 class="mb-4 text-center">Vanliga frågor</h2>
                <div class="accordion">
                    <!-- Fråga 1 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                Vad innebär det att "iterera" ett recept?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                Det är vår absoluta favoritfunktion! Att iterera betyder att du tar ett befintligt
                                recept och gör det till ditt eget. Om du till exempel hittar ett recept på en
                                klassisk pastasås men väljer att byta ut grädden mot kokosmjölk och slänga i lite
                                chili för extra sting, då skapas en ny version. På så sätt kan alla se din smarta
                                förbättring medan originalet finns kvar. Det är så vi tillsammans bygger världens
                                mest levande kokbok!</div>
                        </div>
                    </div>
                    <!-- Fråga 2 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Måste jag vara ett proffs i köket för att få vara med?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                Verkligen inte – snarare tvärtom! Vi har fått nog av stela proffskök och pekpinnar.
                                Chef’s Kiss är till för den riktiga maten som lagas i vanliga hem. Vi älskar både de
                                fantastiska framgångarna och de där gångerna då allt blev en enda röra men smakade
                                gott ändå. Här är det matglädjen som räknas, inte hur snyggt du kan lägga upp en
                                persiljekvist!
                            </div>
                        </div>
                    </div>
                    <!-- Fråga 3 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Hur fungerar betygssystemet?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                Vi kör på en skala mellan 1 och 5 stjärnor, men vi ser det mer som en high-five än
                                en domstol. Du kan betygssätta originalet, men också de olika iterationerna som
                                andra har gjort. Det hjälper oss alla att hitta de där små genvägarna eller extra
                                ingredienserna som faktiskt gör att en rätt går från "okej" till "Chef's kiss!".
                            </div>
                        </div>
                    </div>
                    <!-- Fråga 4 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Hur sparar jag mina favoritrecept?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                Hittat något som ser magiskt gott ut? Då är det bara att ge det en "Chef's Kiss"!
                                Det fungerar precis som en gilla-markering, fast med vår egen
                                touch. När du klickar på den lilla hand-symbolen sparas receptet under "mina
                                favoriter" i din profil.
                            </div>
                        </div>
                    </div>
                    <!-- Kontaktinfo -->
                    <div class="container mt-4 bg-white rounded-3 p-4">
                        <h3 class="mb-4 fs-5 text">Kontaktinformation</h3>
                        <p>kundservice@chefskiss.se</p>
                        <p>070-000 00 00</p>
                    </div>
                </div>
            </div>
            <!-- Formulär -->
            <div class="col-sm-8 p-4">
                <h2 class="mb-4">Släng iväg ett meddelande!</h2>
                <div class="row mb-3">
                    <div class="col">
                        <label for="firstName" class="form-label visually-hidden">Förnamn</label>
                        <input type="text" class="form-control" id="firstName" placeholder="Förnamn"
                            aria-label="First name">
                    </div>
                    <div class="col">
                        <label for="lastName" class="form-label visually-hidden">Efternamn</label>
                        <input type="text" class="form-control" id="lastName" placeholder="Efternamn"
                            aria-label="Last name">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label visually-hidden">E-postadress</label>
                    <input type="email" class="form-control" id="email" placeholder="E-postadress">
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label">Vad gäller det?</label>
                    <select class="form-select" id="subject">
                        <option selected>Välj kategori...</option>
                        <option value="1">Tekniskt strul</option>
                        <option value="2">Recept-frågor</option>
                        <option value="3">Övrigt smått och gott</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Meddelande</label>
                    <textarea class="form-control" id="message" rows="5"></textarea>
                </div>
                <button type="submit" class="send">Skicka</button>
            </div>
        </div>
    </div>
    <!-- Om oss -->
    <div class="container-fluid text-center about mt-5 py-5">
        <div class="row justify-content-center">
            <div class="col-5">
                <h2 class="mb-4">Om oss</h2>
                <p>Chef's kiss är en passionerad matlagningsplattform som strävar efter att göra matlagning roligare
                    och
                    enklare för alla. Vi erbjuder ett brett utbud av recept, tips och inspiration för både nybörjare
                    och erfarna kockar. Vårt mål är att hjälpa dig att upptäcka nya smaker, förbättra dina
                    matlagningsfärdigheter
                    och göra varje måltid till en minnesvärd upplevelse. Utforska våra recept och hitta din nya
                    favoritdrätt idag!</p>
            </div>
        </div>
    </div>
</main>

<?php
// Footer
require_once 'assets/includes/footer.php';
?>