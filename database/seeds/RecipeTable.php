<?php

use Illuminate\Database\Seeder;

class RecipeTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipes')->delete();
        DB::table('recipes')->insert([
            'user_id' => '1',
            'name'=> 'Spaghetti',
            'instructions' => 'Boil 4 quarts of water. Add salt to taste. Add pasta to water, wait for it to boil again. Stir frequently, cook about 10 minutes. Remove from heat and drain. Add back to pan, add 1 jar tomato sauce. Mix and enjoy!',
            'prep_time' => '20',
        ]);
        DB::table('recipes')->insert([
            'user_id' => '1',
            'name' => 'Omlette',
            'instructions' => '"First, prepare the filling. A basic rule of thumb is that you need one quarter to one third cup of filling for every two eggs. If you are using a filling that needs to be cooked — such as apples, mushrooms, onions, peppers, leeks — quickly sauté in a small frying pan with 1 teaspoon of the butter. If you are making a cheese omelette, either slice the cheese thinly or grate it finely and put aside.
            Crack the eggs into a small mixing bowl. Stir gently with a fork until well-beaten. Add the milk or water, salt and pepper, and any herbs, and set aside.
            Heat a 6- to 8-inch omelette pan over high heat until very hot (approximately 30 seconds). Add the butter, making sure it coats the bottom of the pan. As soon as the butter stops bubbling and sizzling (and before it starts to brown), slowly pour in the egg mixture. 
            Tilt the pan to spread the egg mixture evenly. Let eggs firm up a little, and after about ten seconds shake the pan a bit and use a spatula to gently direct the mixture away from the sides and into the middle. Allow the remaining liquid to then flow into the space left at the sides of the pan. 
            Continue to cook for another minute or so until the egg mixture holds together. While the middle is still a little runny, add the filling. Put in sautéed vegetables or fruit first, near the center, then sprinkle any cheese on top. 
            Tilt the pan to one side and use the spatula to fold approximately one third of the omelette over the middle. Shake the pan gently to slide the omelette to the edge of the pan. 
            Holding the pan above the serving plate, tip it so the omelette rolls off, folding itself onto the plate. The two edges will be tucked underneath."',
            'prep_time' => '15',

        ]);
        DB::table('recipes')->insert([
            'user_id' => '1',
            'name' => 'Cheese Burger',
            'instructions' => 'Preheat grill to at least 500 degrees. Create beef patty from 1/4lb beef while waiting. Season to taste. Place beef patty on grill wait for 5 minutes. While cooking prepair other ingredients. After 5 minutes filp burger and cook 3 minutes. Remove from grill and    immediatly place cheese on patty to let it melt. Place patty on bun with the rest of the ingredients on top. Enjoy',
            'prep_time' => '15',
        ]);
        DB::table('recipes')->insert([
            'user_id' => '1',
            'name' => 'Turkey Sandwich',
            'instructions' => 'Place slices of bread on plate. Add cheese to one slice. Place meat on the other slice. Combine and enjoy!',
            'prep_time' => '5',
        ]);
        DB::table('recipes')->insert([
            'user_id' => '1',
            'name' => 'Grilled Cheese',
            'instructions' => 'Spread 1/2 tablespoon of butter on one side of each slice of bread. Place cheese on un buttered side. Place slices together with butter facing outward. Heat skillet to medium heat. Place sandwhich on skillet, cook on each side for 3 minutes to melt cheese. Enjoy!',
            'prep_time' => '10',
        ]);
        DB::table('recipes')->insert([
            'user_id' => '1',
            'name' => 'Tacos',
            'instructions' => '"Cook beef in 10-inch skillet over medium heat 8 to 10 minutes, stirring occasionally, until brown; drain.
            Stir salsa into beef. Heat to boiling, stirring constantly; reduce heat to medium-low. Cook 5 minutes, stirring occasionally. Pour beef mixture into large serving bowl.
            Heat taco shells as directed on package. Serve taco shells with beef mixture, lettuce, tomato and cheese."',
            'prep_time' => '20',
        ]);
    }
}
