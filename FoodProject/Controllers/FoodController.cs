using FoodProject.Models;
using FoodProject.Repositories;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.Rendering;
using X.PagedList;

namespace FoodProject.Controllers
{
    public class FoodController : Controller
    {
        FoodRP foodRP = new FoodRP();
        Context c= new Context();
        public IActionResult Index(int page=1)
        {
            
            return View(foodRP.TList("Category").ToPagedList(page,3));
        }
        [HttpGet]
        public IActionResult AddFood()
        { 
            List<SelectListItem>values=(from x in c.categories.ToList()
                                        select new SelectListItem
                                        {
                                           Text=x.CategoryName,
                                           Value=x.CategoryID.ToString(),

                                        }).ToList();
            ViewBag.v1 = values;                             
        return View();
        }
        [HttpPost]
        public IActionResult AddFood(Food p)
        {
            foodRP.TAdd(p);
            return RedirectToAction("Index");
        }
        public IActionResult DeleteFood(int id)
        {
            foodRP.TDelete(new Food { FoodID= id});
            return RedirectToAction("Index");
        }
        public IActionResult FoodGet(int id)
        {
          
            List<SelectListItem> values = (from y in c.categories.ToList()
                                           select new SelectListItem
                                           {
                                               Text = y.CategoryName,
                                               Value = y.CategoryID.ToString()
                                           }).ToList();
            ViewBag.v1 = values;

            var x = foodRP.TGet(id);

            if (x == null)
            {
                return RedirectToAction("Index");
            }

            
            Food f = new Food()
            {
                FoodID = x.FoodID, 
                CategoryID = x.CategoryID,
                Name = x.Name,
                Price = x.Price,
                Stock = x.Stock,
                Description = x.Description,
                ImageUrl = x.ImageUrl
            };

            return View(f);
        }
        [HttpPost]
        public IActionResult FoodUpdate(Food p)
        {
            var x = foodRP.TGet(p.FoodID);
            x.Name = p.Name;
            x.Stock = p.Stock;
            x.Price = p.Price;
            x.ImageUrl = p.ImageUrl;
            x.Description = p.Description;
            x.CategoryID = p.CategoryID;
            foodRP.TUpdate(x);
            return RedirectToAction("Index");
        }

    }
}
