<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Transaction;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create or retrieve users based on email to avoid duplicates
        $user1 = User::firstOrCreate(
            ['email' => 'user1@example.com'],
            [
                'name' => 'User One',
                'password' => bcrypt('password'),
            ]
        );

        $user2 = User::firstOrCreate(
            ['email' => 'user2@example.com'],
            [
                'name' => 'User Two',
                'password' => bcrypt('password'),
            ]
        );

        // Create or retrieve categories for user1
        $category1 = Category::firstOrCreate(
            ['user_id' => $user1->id, 'name' => 'Salary', 'type' => 'income'],
            ['user_id' => $user1->id, 'name' => 'Salary', 'type' => 'income', 'photo' => 'categories/salary.jpg']
        );

        $category2 = Category::firstOrCreate(
            ['user_id' => $user1->id, 'name' => 'Food', 'type' => 'expense'],
            ['user_id' => $user1->id, 'name' => 'Food', 'type' => 'expense', 'photo' => 'categories/food.jpg']
        );

        // Create or retrieve categories for user2
        $category3 = Category::firstOrCreate(
            ['user_id' => $user2->id, 'name' => 'Freelance', 'type' => 'income'],
            ['user_id' => $user2->id, 'name' => 'Freelance', 'type' => 'income', 'photo' => 'categories/freelance.jpg']
        );

        $category4 = Category::firstOrCreate(
            ['user_id' => $user2->id, 'name' => 'Bills', 'type' => 'expense'],
            ['user_id' => $user2->id, 'name' => 'Bills', 'type' => 'expense', 'photo' => 'categories/bills.jpg']
        );

        // Create or retrieve transactions for user1
        Transaction::firstOrCreate(
            [
                'user_id' => $user1->id,
                'category_id' => $category1->id,
                'amount' => 5000000.00,
                'transaction_date' => '2025-05-01',
            ],
            [
                'user_id' => $user1->id,
                'category_id' => $category1->id,
                'amount' => 5000000.00,
                'transaction_date' => '2025-05-01',
                'description' => 'Monthly salary',
            ]
        );

        Transaction::firstOrCreate(
            [
                'user_id' => $user1->id,
                'category_id' => $category2->id,
                'amount' => 50000.00,
                'transaction_date' => '2025-05-02',
            ],
            [
                'user_id' => $user1->id,
                'category_id' => $category2->id,
                'amount' => 50000.00,
                'transaction_date' => '2025-05-02',
                'description' => 'Lunch at cafe',
            ]
        );

        // Create or retrieve transactions for user2
        Transaction::firstOrCreate(
            [
                'user_id' => $user2->id,
                'category_id' => $category3->id,
                'amount' => 2000000.00,
                'transaction_date' => '2025-05-01',
            ],
            [
                'user_id' => $user2->id,
                'category_id' => $category3->id,
                'amount' => 2000000.00,
                'transaction_date' => '2025-05-01',
                'description' => 'Freelance project',
            ]
        );

        Transaction::firstOrCreate(
            [
                'user_id' => $user2->id,
                'category_id' => $category4->id,
                'amount' => 300000.00,
                'transaction_date' => '2025-05-02',
            ],
            [
                'user_id' => $user2->id,
                'category_id' => $category4->id,
                'amount' => 300000.00,
                'transaction_date' => '2025-05-02',
                'description' => 'Electricity bill',
            ]
        );
    }
}
