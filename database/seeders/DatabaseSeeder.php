<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks to allow truncation
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate tables to clear existing data
        User::truncate();
        Category::truncate();
        Transaction::truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Create users
        $user1 = User::create([
            'name' => 'User One',
            'email' => 'user1@example.com',
            'password' => bcrypt('password'),
        ]);

        $user2 = User::create([
            'name' => 'User Two',
            'email' => 'user2@example.com',
            'password' => bcrypt('password'),
        ]);

        // Create categories
        $category1 = Category::create(['user_id' => $user1->id, 'name' => 'Salary', 'type' => 'income']);
        $category2 = Category::create(['user_id' => $user1->id, 'name' => 'Food', 'type' => 'expense']);
        $category3 = Category::create(['user_id' => $user2->id, 'name' => 'Freelance', 'type' => 'income']);
        $category4 = Category::create(['user_id' => $user2->id, 'name' => 'Bills', 'type' => 'expense']);

        // Create transactions
        Transaction::create([
            'user_id' => $user1->id,
            'category_id' => $category1->id,
            'amount' => 5000000.00,
            'transaction_date' => '2025-05-01',
            'description' => 'Monthly salary',
        ]);
        Transaction::create([
            'user_id' => $user1->id,
            'category_id' => $category2->id,
            'amount' => 50000.00,
            'transaction_date' => '2025-05-02',
            'description' => 'Lunch at cafe',
        ]);
        Transaction::create([
            'user_id' => $user2->id,
            'category_id' => $category3->id,
            'amount' => 2000000.00,
            'transaction_date' => '2025-05-01',
            'description' => 'Freelance project',
        ]);
        Transaction::create([
            'user_id' => $user2->id,
            'category_id' => $category4->id,
            'amount' => 300000.00,
            'transaction_date' => '2025-05-02',
            'description' => 'Electricity bill',
        ]);
    }
}
