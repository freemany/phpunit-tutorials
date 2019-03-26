export default [
    {
        content: `
<h5>Install npm dependencies and phpunit:</h5>
<pre><code class="bash">
$ npm i
$ php composer.phar install
</code></pre>
<p>Once they are installed, you should be able to run the first test</p>
<pre><code clas="bash">
$ php vendor/bin/phpunit 
</code></pre>
`
    },
    {
        content: `
<h5>Code here:</h5>
<pre><code clas="php">        
class PersonTest extends TestCase
{
     public function testPush()
     {
         $person = new Person();

         $this->assertTrue($person->push());
     }
}
</code></pre>       
`
    } // 1

];