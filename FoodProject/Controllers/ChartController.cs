using FoodProject.Data;
using FoodProject.Models;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore.Metadata.Internal;

namespace FoodProject.Controllers
{
    [AllowAnonymous]
    public class ChartController : Controller
    {
        public IActionResult Index()
        {
            return View();
        }
        public IActionResult Index2()
        {
            return View();
        }
        public IActionResult VisualizeProductResult()
        {
            return Json(ProList());
        }
        public List<Class1> ProList()
        {
            List<Class1> cs=new List<Class1>();
            cs.Add(new Class1()
            {
                proname = "Computer",
                stock = 190

            });
            cs.Add(new Class1()
            {
                proname = "Tv",
                stock = 97

            });
            cs.Add(new Class1()
            {
                proname = "Disk",
                stock = 422

            });
            return cs;
        }
        public IActionResult Index3()
        {
            return View();
        }
        public IActionResult VisualizeProductResult2()
        {
            return Json(FoodList());
        }
        public List<Class2> FoodList()
        { 
        List<Class2> cs2=new List<Class2>();
            using(var c=new Context())
            {
                cs2 = c.foods.Select(x => new Class2
                {
                    foodname =x.Name,
                    stock = x.Stock

                }).ToList();
            }
            return cs2;
        }
        public IActionResult Statistics()
        {
            Context c = new Context();
            var deger1 = c.foods.Count();
            ViewBag.d1 = deger1;

            var deger2 = c.categories.Count();
            ViewBag.d2 = deger2;

            var deger3 = c.foods.Where(x => x.CategoryID == 1).Count();
            ViewBag.d3 = deger3;

            var deger4 = c.foods.Where(x => x.CategoryID == 3).Count();
            ViewBag.d4 = deger4;

            var deger5 = c.foods.Sum(x=>x.Stock);
            ViewBag.d5 = deger5;


            var deger6 = c.foods.Where(x => x.CategoryID == c.categories
    .Where(y => y.CategoryName == "Drinks")
    .Select(z => z.CategoryID)
    .FirstOrDefault()).Count(); 

            ViewBag.d6 = deger6;


            var deger7 = c.foods.OrderByDescending(x => x.Stock).Select(y => y.Name).FirstOrDefault();
            ViewBag.d7= deger7;

            var deger8 = c.foods.Average(x => x.Price);
            ViewBag.d8= deger8;

            var deger9= c.categories.Count(x => x.Status == false);
            ViewBag.d9= deger9;

            var deger10= c.foods.Sum(x => x.Price * x.Stock);
            ViewBag.d10= deger10;

            var deger11= c.foods.OrderBy(x => x.Stock).Select(y => y.Name).FirstOrDefault();
            ViewBag.d11= deger11;


            var drinksID = c.categories.Where(x => x.CategoryName == "Drinks")
                           .Select(y => y.CategoryID)
                           .FirstOrDefault();

            var deger12 = c.foods.Where(x => x.CategoryID == drinksID)
                                 .Average(x => x.Price);

            ViewBag.d12 = deger12.ToString("0.00");
            return View();


           
        }
    }
}
