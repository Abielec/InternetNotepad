<?php

use Illuminate\Database\Seeder;
use App\BlogPosts;
class PostsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Post = new BlogPosts();
        $Post->WritedBy = 1;
        $Post->Title = "Witam serdecznie na moim portalu !";
        $Post->content = '<p class="lead">Witam wszystkich serdecznie, nazywam się Adrian Bielec, urodziłem się oraz pochodzę z Lublina. Mam 18 lat i jestem uczniem 3 klasy technikum informatycznego, jestem inicjatorem całego tego projektu.';
        $Post->Image = "PostImages/hello.jpg";
        $Post->save();
        
        $Post = new BlogPosts();
        $Post->WritedBy = 1;
        $Post->Title = "Słowami wstępu o projekcie";
        $Post->content = '<p class="lead">Ideologia, oraz okres kreowania tej inicjatywy zaczął się dużo wcześniej. Od zawsze byłem pomieszaną osobą, lubiłem z jednej strony chaos i zasady. Chaos mi odpowiadał przy poznawaniu nowych osób, oraz gdy chciałem dać czemuś wyraz. Zasady zaś były czymś co jest ustalone z góry, i czego nie mogę zmienić a powinienem przestrzegać, najprostszym przykładem jest prawo, lecz inną że tak powiem grupą zasad jest jeszcze to jak zachowuje się nasz organizm. Jestem, a przynajmniej czuję się informatykiem i zaintrygowało mnie to jak nasz organizm działa w zależności od tego jak o niego dbamy, w celach tego projektu jest uświadomienie jak nasz organizm funkcjonuje w zależności od tego jak go budujemy. Mogę więc powiedzieć, że jest to próba stworzenia eksperymentu socjalnego. </p>';
        $Post->Image = "PostImages/project.png";
        $Post->save();

        $Post = new BlogPosts();
        $Post->WritedBy = 1;
        $Post->Title = "Co będzie zawierać blog ?";
        $Post->content = '<p class="lead">Blog ma na celu zaciekawić odbiorcę, jak i również wpisy umieszczane na stronie mają być formą raportu, dzięki której użytkownik będzie widział że strona jest ciągle aktualizowana i poprawiana, oraz aktualizacje wprowadzane do aplikacji. Treść wpisów może zawierać wyniki oraz analizę zdobytych danych, krótkie ciekawostki, wywiady z różnymi ludźmi z różnych dziedzin naukowych, oraz jak wyżej wspomniałem informację o aktualizacjach.</p>';
        $Post->Image = "PostImages/content.jpg";
        $Post->save();

        $Post = new BlogPosts();
        $Post->WritedBy = 1;
        $Post->Title = "Masz wpływ na projekt !";
        $Post->content = '<p class="lead">Jeżeli masz propozycje by coś dodać, edytować, skasować nie krępuj się napisz mi to ! Tu jest mój e-mail: <b>adrianxy3@gmail.com !</b> Każde wiadomości mają znaczenie, i mają wpływ na życie projektu ponieważ jest on realizowany z myślą o człowieku, czyli o nas wszystkich !';
        $Post->Image = "PostImages/Sila.jpg";
        $Post->save();
        
        $Post = new BlogPosts();
        $Post->WritedBy = 1;
        $Post->Title = "Z czym to wszystko się je ?";
        $Post->content = '
        <p class="lead">Żeby jakkolwiek zacząć działać z naszą aplikacją, pierw trzeba zrozumieć co ona w ogóle robi, z czego korzysta oraz należy poznać podstawowe nazewnictwo.</p>
        <hr>
        <p class="lead">Zaczniemy więc od końca, zapewne większość z was słyszała o czymś takim jak <b>BMI</b> ale czym to w ogóle jest? Jest to „Wskaźnik masy ciała” z ang „Body Mass Index”, klasyfikacja wskaźnika BMI została opracowana wyłącznie dla dorosłych. Jasne jest to że najczęściej chcemy wyliczyć BMI gdy chcemy schudnąć, ewentualnie przybrać na masie. Dlaczego? A otóż dlatego że wskaźnik BMI jest niedokładny, prostym przykładem są kulturyści, gdzie mimo że są wysportowani, i nie mają dużej tkanki tłuszczowej wskaźnik wskazuje na otyłość. Na stronie otrzymasz informację o swoim BMI, jednakże umożliwiamy Ci wyłączenie pokazywanie tej opcji gdyż no jak sam już rozumiesz może ona być nietrafna, i może w pewnym momencie po prostu wkurzać.</p>
        <hr>
        <p class="lead"> Zakresy BMI według poszerzonej klasyfikacji:
         <ul class="lead">
         <li><16,0 – wygłodzenie</li>
         <li>16,0-16,99 – Wychudzenie</li>
         <li>17,0–18,49 – niedowaga</li>
         <li>18,5-24,99 – Waga prawidłowa</li>
         <li>25,0-29,99 – Nadwaga</li><li>30,0-34,99 – I stopień otyłości</li>
         <li>35,0-39,99 – II stopień otyłości</li><li>>=40 – III stopień otyłości</li>
         </ul>
         <small class="text-muted">źródło: http://pl.wikipedia.org</small> 
         </p>
         <hr>
         <p class="lead"> Wzór na BMI jest bardzo prosty <b>BMI = Masa<sub>kg</sub> / Wzrost<sup>2</sup><sub>m</sub></b>. Czyli na przykład ja mam 180 cm wzrostu i 80kg, pierwsze co robię to zamieniam centymetry na metry czyli dziele 180 przez 100, wychodzi mi 1,8. Następne co należy zrobić to podłożyć do wzoru czyli: 80 / 1.8<sup>2</sup> => 80 / 3,24 = 24,69. Mój wskaźnik BMI wynosi więc 24.69 </p>
         <hr>
         <h3 class="text-center">Podstawowa Przemiana Materii</h3>
         <p class="lead">Podstawowa Przemiana Materii czyli w skrócie PPM, jest to liczba kalorii potrzebna organizmowi do podstawowego funkcjonowania, czyli do prawidłowej pracy nerek i wszystkich innych organów, podtrzymujących procesy życiowe. Wątpię jednak żeby każdy z nas był warzywem, i nie ruszał się istnieje również definicja „całkowita przemiana materii” (CPM), jest to już dokładniejsza wartość  równa zapotrzebowaniu naszego organizmu na kalorie.</p><p class="lead"> Oczywiście do pomiarów mamy możliwych 3 wzory, u nas na stronie jest możliwy wybór pomiędzy 2 wzorami <b>Harrisa-Benedicta</b> oraz <b>Mifflin-St Jeor-a</b>, jest jeszcze wzór Katch-McArdle lecz z niego nie będziemy korzystać gdyż wymaga on już dokładniejszych danych(masy mięśniowej ciała w kg)</p>
         <p class="lead">Wzór Harrisa-Benedicta dla mężczyzn:  <b>66+(13,7*M<sub>ciała</sub>) + (5 *wzrost<sub>cm</sub>) – (6,76 * wiek(lata))</b>
         </p>';
        $Post->Image = "PostImages/fit.jpg";
        $Post->save();
    }
}
