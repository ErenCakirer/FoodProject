using System.ComponentModel.DataAnnotations;

namespace FoodProject.Models
{
    public class Admin
    {
        [Key]
        public int AdminID { get; set; }
        public string Username { get; set; }
        public string Password { get; set; }
        public string AdminRole { get; set; }
    }
}
