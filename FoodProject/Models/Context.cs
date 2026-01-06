using Microsoft.EntityFrameworkCore;

namespace FoodProject.Models
{
    public class Context:DbContext
    {
        protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder)
        {
            optionsBuilder.UseSqlServer("server=(localdb)\\MSSQLLocalDB;database=CoreFood;integrated security=true");
        }
        public DbSet<Food> foods { get; set; }
        public DbSet<Category> categories { get; set; }
        public DbSet<Admin> admins { get; set; }
    }
}
