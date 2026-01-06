using FoodProject.Repositories;
using Microsoft.AspNetCore.Mvc;
using FoodProject.Models;
using Microsoft.AspNetCore.Authorization;

namespace FoodProject.Controllers
{
    public class CategoryController : Controller
    {
        CategoryRP categoryRP = new CategoryRP();
        
        public IActionResult Index()
        {
            
            return View(categoryRP.TList());
        }
        [HttpGet]
        public IActionResult  CategoryAdd()
        {
            return View();
        }
        [HttpPost]
        public IActionResult CategoryAdd(Category p)
        {
            if(!ModelState.IsValid)
            {
                return View("CategoryAdd");
            }
           categoryRP.TAdd(p);
            return RedirectToAction("Index");
        }
        public IActionResult CategoryGet(int id)
        {
           
            var x = categoryRP.TGet(id);

          
            if (x == null)
            {
                return RedirectToAction("Index");
            }

           
            Category ct = new Category()
            {
                CategoryName = x.CategoryName,
                Description = x.Description,
                CategoryID = x.CategoryID
            };

            return View(ct);
        }
        public IActionResult CategoryUpdate(Category p)
        {
            var x = categoryRP.TGet(p.CategoryID);
            x.CategoryName = p.CategoryName;
            x.Description = p.Description;
            x.Status = true;
            categoryRP.TUpdate(x);
            return RedirectToAction("Index");
        }
        public IActionResult CategoryDelete(int id)
        {
            var x = categoryRP.TGet(id);
            x.Status=false;
            categoryRP.TUpdate(x);
            return RedirectToAction("Index");
        }
    }
}
