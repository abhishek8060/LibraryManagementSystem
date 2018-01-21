#include<bits/stdc++.h>
using namespace std;
int main(){

    int a[100000];
    int n,k;

    cin>>n>>k;

    for (int i = 0; i < ; ++i)
       scanf("%d",&a[i]);


    int cnt=a[0];

    if(cnt>=8)
    {
      cnt-=8;
      k-=8;
    }
    else
    {
      k-=cnt;
      cnt=0;
    }
   int i=1,ans=1;
    while(k>0 && i<n)
    {
      if(a[i]>8)
      {
        cnt+=(a[i]-8);
        k-=8;
        ans++;
      }
      else
         {
          if(a[i]+cnt>8)
            {k-=8;
             cnt=(a[i]+cnt)-8;}
           else
             {
              k-=a[i];
             }  
          ans++;
         }

         i++;
    }

    if(k<=0)
      cout<<ans<<endl;
    else
      cout<<"-1"<<endl;



	return 0;
}