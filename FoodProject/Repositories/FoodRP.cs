using FoodProject.Models;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using System;




namespace FoodProject.Repositories
{
    
    public class FoodRP:GenericRP<Food>
    {
        Context c = new Context();
        public void FoodAdd(Food f)
        {
            c.foods.Add(f);
            c.SaveChanges();
        }
        public void FoodRemove(Food f)
        {
            c.foods.Remove(f);
            c.SaveChanges();
        }
        public void FoodUpdate(Food f)
        {
            c.foods.Update(f);
            c.SaveChanges();
        }
        public List<Food> FoodList()
        {
            return c.foods.ToList();
        }
        public Food GetFood(int id)
        {
            return c.foods.Find(id);
        }
    }
}
