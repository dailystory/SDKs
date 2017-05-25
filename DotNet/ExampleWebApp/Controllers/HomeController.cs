using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using DailyStory.SDK.DotNet;

namespace ExampleWebApp.Controllers
{
    public class HomeController : Controller
    {
        public ActionResult Index()
        {
            return View();
        }

        public ActionResult CustomForm_01()
        {
            return View();
        }

        public ActionResult CustomForm_02()
        {
            return View();
        }

        public ActionResult About()
        {
            ViewBag.Message = "Your application description page.";

            Visitor v = new Visitor("ghg0ctulvdx7bu10", 71, "Test Conversion", "abc123@test.com");
            v.Convert();

            return View();
        }

        public ActionResult Contact()
        {
            ViewBag.Message = "Your contact page.";

            return View();
        }
    }
}