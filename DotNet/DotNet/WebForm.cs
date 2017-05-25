using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Net;
using System.Runtime.Caching;

namespace DailyStory.SDK.DotNet
{
    public class WebForm
    {
        private static string url = "https://cms-1.dailystory.com/webform/{1}/{0}";

        public string SiteId { get; private set; }
        public string DataCenter { get; private set; } = "us-1";

        public WebForm(string siteId)
        {
            // do we have a data center id
            if (siteId.Contains("-"))
            {
                SiteId = siteId.Substring(0, siteId.IndexOf("-"));
                DataCenter = siteId.Substring(siteId.IndexOf("-") + 1);
            }
            else
            {
                SiteId = siteId;
            }
        }
        
        public static string RenderWebForm(string siteId, string webFormId)
        {
            WebForm f = new WebForm(siteId);
            string form = null;

            string cacheKey = "webform-{0}-{1}";
            cacheKey = string.Format(cacheKey, siteId, webFormId);

            form = (string)MemoryCache.Default[cacheKey];

            if (null == form)
            {
                using (WebClient client = new WebClient())
                {
                    Uri httpGetUrl = new Uri(string.Format(url, webFormId, f.SiteId));

                    form = client.DownloadString(httpGetUrl);
                }

#if !DEBUG
                // Add to the cache
                MemoryCache.Default.Add(cacheKey, form, DateTime.Now.AddMinutes(60), null);
#endif
            }

            return form;

        }

    }
}
